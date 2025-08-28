<?php

// app/Services/GraphMailService.php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use RuntimeException;

class GraphMailService
{
    private function getToken(string $account): string
    {
        $row = DB::table('ms_tokens')->where('account', $account)->first();
        if (!$row) throw new RuntimeException('No token stored for account');

        $obtained = Carbon::parse($row->obtained_at);
        if ($obtained->addSeconds($row->expires_in - 60)->isFuture()) {
            return decrypt($row->access_token);
        }

        // Refresh
        $tenant = config('services.ms.tenant', 'consumers');
        $resp = Http::asForm()->post("https://login.microsoftonline.com/{$tenant}/oauth2/v2.0/token", [
            'client_id'     => config('services.ms.client_id'),
            'client_secret' => config('services.ms.secret'),
            'grant_type'    => 'refresh_token',
            'refresh_token' => decrypt($row->refresh_token),
            'redirect_uri'  => config('services.ms.redirect'),
        ])->throw()->json();

        DB::table('ms_tokens')->where('id', $row->id)->update([
            'access_token'  => encrypt($resp['access_token']),
            'refresh_token' => encrypt($resp['refresh_token'] ?? decrypt($row->refresh_token)),
            'expires_in'    => $resp['expires_in'],
            'obtained_at'   => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        return $resp['access_token'];
    }

    public function send(string $fromAccount, string $to, string $subject, string $html, ?string $text = null): void
    {
        $token = $this->getToken($fromAccount);

        $payload = [
            'message' => [
                'subject' => $subject,
                'body'    => [
                    'contentType' => 'HTML',
                    'content'     => $html,
                ],
                'toRecipients' => [
                    ['emailAddress' => ['address' => $to]],
                ],
            ],
            'saveToSentItems' => true,
        ];

        // endpoint للحساب الشخصي المصدّق (me)
        Http::withToken($token)
            ->post('https://graph.microsoft.com/v1.0/me/sendMail', $payload)
            ->throw();
    }
}
