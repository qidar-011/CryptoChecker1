<?php

namespace App\Http\Controllers\Website;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // عرض صفحة الاتصال
        return view('website.contactus.index');

    }


     /**
     * معالجة إرسال نموذج الاتصال.
     */
    public function submit(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'wallet' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'consultation_type' => 'required|string|in:technical-support,airdrop-inquiries,account-issues,other',
            'message' => 'required|string',
        ]);

        // حفظ البيانات في قاعدة البيانات
        ContactUs::create($validated);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح.');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
