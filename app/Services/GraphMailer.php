<?php

namespace App\Services;

use Microsoft\Graph\Graph;
use App\Models\MailSetting;

class GraphMailer
{
    public static function send($to, $subject, $bodyHtml)
    {
        $settings = MailSetting::first();
        if (!$settings) {
            throw new \Exception('لم يتم ضبط إعدادات البريد في قاعدة البيانات.');
        }

        $accessToken = GraphTokenService::getAccessToken();

        if (!$accessToken) {
            throw new \Exception('فشل في جلب Access Token من Microsoft Graph.');
        }

        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $email = [
            'message' => [
                'subject' => $subject,
                'body' => [
                    'contentType' => 'HTML',
                    'content' => $bodyHtml,
                ],
                'toRecipients' => [
                    [
                        'emailAddress' => [
                            'address' => $to,
                        ],
                    ],
                ],
            ],
            'saveToSentItems' => true,
        ];

        return $graph
            ->createRequest('POST', '/users/' . $settings->graph_from . '/sendMail')
            ->attachBody($email)
            ->execute();
    }
}
