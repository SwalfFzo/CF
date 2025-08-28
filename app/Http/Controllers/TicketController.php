<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    // عرض النموذج (لمن يحتاجه)
    public function create()
    {
        return view('tickets.create'); // لو عندك صفحة خاصة
    }

    // حفظ التذكرة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => ['required', 'regex:/^(05\d{8}|\+9665\d{8})$/'],
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'type'    => Auth::check() ? 'user' : 'guest',
        ]);

        // أول رسالة يتم تسجيلها
        $ticket->messages()->create([
            'message' => $request->message,
            'sender'  => Auth::check() ? 'user' : 'user', // كلها user، الطرف الآخر admin
        ]);

        // إشعار عبر البريد
        Mail::to(config('mail.from.address'))->queue(new \App\Mail\NewTicketSubmitted($ticket));

        // إشعار للمرسل نفسه
        Mail::to($ticket->email)->queue(new \App\Mail\TicketConfirmation($ticket));

        return back()->with('success', 'تم إرسال التذكرة بنجاح، سنقوم بالتواصل معك قريبًا.');
    }

    // الرد على تذكرة - (ممكن admin فقط)
    public function reply(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        // تسجيل الرد
        $ticket->messages()->create([
            'message' => $request->message,
            'sender'  => 'admin',
        ]);

        // تحديث الحالة إلى "تحت المعالجة"
        $ticket->update(['status' => 'processing']);

        // إرسال إشعار للعميل
        Mail::to($ticket->email)->queue(new \App\Mail\AdminTicketReply($ticket, $request->message));

        return back()->with('success', 'تم الرد على التذكرة.');
    }

    // إغلاق التذكرة
    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);

        Mail::to($ticket->email)->queue(new \App\Mail\TicketClosed($ticket));

        return back()->with('success', 'تم إغلاق التذكرة.');
    }

    // إعادة فتح
    public function reopen(Ticket $ticket)
    {
        $ticket->update(['status' => 'reopened']);

        return back()->with('success', 'تم إعادة فتح التذكرة.');
    }
}
