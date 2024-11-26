<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Models\SupportRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    /**
     * عرض صفحة Support.
     */
    public function index()
    {
        return view('website.support.index');
    }

    /**
     * معالجة طلب الدعم.
     */
    public function submit(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'walletAddress' => 'nullable|string|max:255',
            'subject' => 'required|string|in:general-inquiry,technical-issue,billing-issue,other',
            'priority' => 'required|string|in:low,medium,high',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:2048', // الحد الأقصى للحجم 2MB
        ]);

        // إنشاء سجل جديد في جدول SupportRequests
        $supportRequest = SupportRequest::create([
            'full_name' => $validated['fullName'],
            'email' => $validated['email'],
            'wallet_address' => $validated['walletAddress'],
            'subject' => $validated['subject'],
            'priority' => $validated['priority'],
            'message' => $validated['message'],
            'attachment_path' => $request->hasFile('attachment') ? $request->file('attachment')->store('attachments') : null,
        ]);

        // إرسال بريد إلكتروني إلى فريق الدعم
        Mail::to('support@cryptochecker.com')->send(new SupportRequestReceived($supportRequest));

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Your support request has been submitted successfully.');
    }
}
