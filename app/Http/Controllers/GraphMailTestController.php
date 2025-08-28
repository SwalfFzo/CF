<?php

// app/Http/Controllers/GraphMailTestController.php
namespace App\Http\Controllers;

use App\Services\GraphMailer;
use Illuminate\Http\Request;

class GraphMailTestController extends Controller
{
    public function form()
    {
        return view('admin.test-email');
    }

    public function send(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
        ]);

        try {
            GraphMailer::send(
                $request->to,
                '📬 اختبار البريد الإلكتروني',
                '<p>تم إرسال هذا البريد بنجاح باستخدام Microsoft Graph API 🎉</p>'
            );

            return back()->with('success', 'تم إرسال البريد التجريبي بنجاح.');
        } catch (\Throwable $e) {
            return back()->with('error', 'فشل في الإرسال: ' . $e->getMessage());
        }
    }
}
