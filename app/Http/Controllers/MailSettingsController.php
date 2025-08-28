<?php

namespace App\Http\Controllers;

use App\Models\MailSetting;
use App\Services\GraphMailer;
use Illuminate\Http\Request;

class MailSettingsController extends Controller
{
    public function edit()
    {
        $settings = MailSetting::firstOrCreate([]);
        return view('admin.mail-settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'ms_tenant' => 'required',
            'ms_client_id' => 'required',
            'ms_client_secret' => 'required',
            'ms_redirect_uri' => 'required|url',
            'graph_from' => 'required|email',
        ]);

        MailSetting::first()->update($request->all());

        return back()->with('success', 'تم تحديث إعدادات البريد بنجاح.');
    }

    public function testSend(Request $request)
    {
        $request->validate(['to' => 'required|email']);

        $settings = MailSetting::first();

        try {
            GraphMailer::send(
                $request->to,
                '📬 اختبار البريد الإلكتروني',
                '<p>تم إرسال هذا البريد بنجاح باستخدام إعدادات Microsoft Graph</p>'
            );

            return back()->with('success', 'تم إرسال البريد التجريبي بنجاح.');
        } catch (\Throwable $e) {
            return back()->with('error', 'فشل في إرسال البريد: ' . $e->getMessage());
        }
    }
}
