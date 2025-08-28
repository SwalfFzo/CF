<?php

// app/Http/Controllers/MicrosoftOauthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MicrosoftOauthController extends Controller
{
    public function redirect(Request $r)
    {
        $state = Str::random(40);
        $r->session()->put('ms_state', $state);

        $query = http_build_query([
            'client_id'     => config('services.ms.client_id'),
            'response_type' => 'code',
            'redirect_uri'  => config('services.ms.redirect'),
            'response_mode' => 'query',
            'scope'         => 'openid email offline_access Mail.Send',
            'state'         => $state,
        ]);

        $tenant = config('services.ms.tenant', 'consumers');
        return redirect("https://login.microsoftonline.com/{$tenant}/oauth2/v2.0/authorize?{$query}");
    }

    public function callback(Request $r)
    {
        abort_unless($r->state === $r->session()->pull('ms_state'), 403, 'Invalid state');

        $tenant = config('services.ms.tenant', 'consumers');
        $resp = Http::asForm()->post("https://login.microsoftonline.com/{$tenant}/oauth2/v2.0/token", [
            'client_id'     => config('services.ms.client_id'),
            'client_secret' => config('services.ms.secret'),
            'grant_type'    => 'authorization_code',
            'code'          => $r->code,
            'redirect_uri'  => config('services.ms.redirect'),
        ])->throw()->json();

        // خزّن التوكنات
        DB::table('ms_tokens')->updateOrInsert(
            ['account' => $this->me($resp['access_token'])],
            [
                'access_token'  => encrypt($resp['access_token']),
                'refresh_token' => encrypt($resp['refresh_token']),
                'expires_in'    => $resp['expires_in'],
                'obtained_at'   => Carbon::now(),
                'updated_at'    => Carbon::now(),
                'created_at'    => Carbon::now(),
            ]
        );

        return redirect('/graph-mail/test')->with('ok', 'Tokens saved. Ready to send.');
    }

    private function me(string $accessToken): string
    {
        $me = Http::withToken($accessToken)
            ->get('https://graph.microsoft.com/v1.0/me?$select=userPrincipalName,mail')
            ->throw()
            ->json();

        // بعض حسابات Hotmail تُرجع mail=null و userPrincipalName=email
        return $me['mail'] ?? $me['userPrincipalName'];
    }
}
