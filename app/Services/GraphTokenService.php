<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\MailSetting;

class GraphTokenService
{
    public static function getAccessToken(): ?string
    {
        $settings = MailSetting::first();
        if (!$settings) return null;

        $client = new Client();

        $response = $client->post('https://login.microsoftonline.com/' . $settings->ms_tenant . '/oauth2/v2.0/token', [
            'form_params' => [
                'client_id'     => $settings->ms_client_id,
                'client_secret' => $settings->ms_client_secret,
                'grant_type'    => 'client_credentials',
                'scope'         => 'https://graph.microsoft.com/.default',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['access_token'] ?? null;
    }
}
