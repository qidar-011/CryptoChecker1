<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * عرض نموذج التسجيل.
     */
    public function showSignUpForm()
    {
        return view('website.auth.signup');
    }

    /**
     * معالجة بيانات التسجيل.
     */
    public function register(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'wallet' => 'required|string|max:255',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // إنشاء المستخدم الجديد
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'wallet_address' => $request->wallet,
        ]);

        // تسجيل الدخول تلقائي بعد التسجيل
        Auth::login($user);

        // إعادة التوجيه إلى لوحة التحكم أو الصفحة الرئيسية
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    /**
     * عرض نموذج تسجيل الدخول.
     */
    public function showLoginForm()
    {
        return view('website.auth.login');
    }

    /**
     * معالجة بيانات تسجيل الدخول.
     */
    public function login(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // محاولة تسجيل الدخول
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // إعادة التوجيه إلى لوحة التحكم أو الصفحة الرئيسية
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        // إذا فشل تسجيل الدخول
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    /**
     * تسجيل الخروج.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    /**
     * إعادة توجيه المستخدم إلى موفر الخدمة الاجتماعية.
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * معالجة رد موفر الخدمة الاجتماعية.
     */
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['social' => 'Authentication failed.']);
        }

        // العثور على المستخدم بواسطة البريد الإلكتروني
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            // إنشاء مستخدم جديد إذا لم يكن موجودًا
            $user = User::create([
                'username' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(str_random(16)), // كلمة مرور عشوائية
                'wallet_address' => '', // يمكنك تعديل هذا بناءً على احتياجاتك
            ]);
        }

        // تسجيل الدخول
        Auth::login($user, true);

        // إعادة التوجيه إلى لوحة التحكم أو الصفحة الرئيسية
        return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
    }
}
