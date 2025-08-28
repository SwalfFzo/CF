<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MsGraphPoCController extends Controller
{
    // ← هذه الدالة كانت مفقودة
    public function redirect(Request $request)
    {
        $state = Str::random(40);
        Session::put('ms_state', $state);

        $query = http_build_query([
            'client_id'     => config('services.ms.client_id'),
            'response_type' => 'code',
            'redirect_uri'  => config('services.ms.redirect'),
            'response_mode' => 'query',
            'scope'         => 'openid email offline_access Mail.Send',
            'state'         => $state,
            'prompt'        => 'select_account', // يعرض اختيار الحساب
        ]);

        $tenant = config('services.ms.tenant', 'consumers');
        return redirect("https://login.microsoftonline.com/{$tenant}/oauth2/v2.0/authorize?{$query}");
    }

    public function callback(Request $request)
    {
        abort_unless($request->state === Session::pull('ms_state'), 403, 'Invalid state');

        $tenant = config('services.ms.tenant', 'consumers');
        $token  = Http::asForm()->post("https://login.microsoftonline.com/{$tenant}/oauth2/v2.0/token", [
            'client_id'     => config('services.ms.client_id'),
            'client_secret' => config('services.ms.secret'),
            'grant_type'    => 'authorization_code',
            'code'          => $request->code,
            'redirect_uri'  => config('services.ms.redirect'),
        ])->throw()->json();

        $accessToken = $token['access_token'];
        $to = env('GRAPH_TEST_TO', 'you@test.com');

        // أرسل البريد (بدون from مع /me/sendMail)
        $resp = Http::withToken($accessToken)->post(
            'https://graph.microsoft.com/v1.0/me/sendMail',
            [
                'message' => [
                    'subject' => 'اختبار إرسال عبر Microsoft Graph (PoC)',
                    'body'    => ['contentType' => 'HTML', 'content' => '<p>تم الإرسال عبر Graph ✅</p>'],
                    'toRecipients' => [
                        ['emailAddress' => ['address' => $to]],
                    ],
                ],
                'saveToSentItems' => true,
            ]
        );

        // اطبع النتيجة للتشخيص
        dd($resp->status(), $resp->json());
    }
}
