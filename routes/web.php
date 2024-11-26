<?php

// use TCG\Voyager\Facades\Voyager;
// use TCG\Voyager\Voyager;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolscanController;
use App\Http\Controllers\Website\FAQController;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\TBotController;
use App\Http\Controllers\Website\TermsController;
use App\Http\Controllers\Website\TokenController;
use App\Http\Controllers\Website\AboutUsController;
use App\Http\Controllers\Website\SupportController;
use App\Http\Controllers\Website\AirdropsController;
use App\Http\Controllers\Website\AnalysisController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\PrivacyPolicyController;
use App\Http\Controllers\Website\NewlyListedCurrencyController;


/* Route::get('/', function () {
    return view('welcome');
}); */

// الصفحة الرئيسية الافتراضية
// Route::get('/', action: [HomeController::class, 'index'])->name('website.home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// مسارات المستخدمين المسجلين
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// مسارات لوحة التحكم باستخدام Voyager
/* Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
}); */

// require __DIR__.'/auth.php';

// مسارات لوحة التحكم
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// مسارات الموقع
Route::get('/', [HomeController::class, 'index'])->name('website.home');
Route::post('/check-token', [HomeController::class, 'checkToken'])->name('website.checkToken');
Route::get('/newly-listed-currencies', [NewlyListedCurrencyController::class, 'index'])->name('website.home.newlyListedCurrencies.index');
// Route::get('/newly-listed-currencies/{id}', [NewlyListedCurrencyController::class, 'show'])->name('website.home.newlyListedCurrencies.show');


// صفحة الفحص باستخدام طريقة GET
Route::get('/solscan', [SolscanController::class, 'show'])->name('solscan.show');

// معالجة الفحص باستخدام طريقة POST
Route::post('/solscan/check', [SolscanController::class, 'checkTransaction'])->name('solscan.check');

// عرض البيانات الخام باستخدام طريقة POST
Route::post('/solscan/raw', [SolscanController::class, 'showRawData'])->name('solscan.raw');



// مسار صفحة الأيردروبات
// Route::get('/airdrops', [AirdropsController::class, 'index'])->name('airdrops.index');
Route::get('/airdrops', [AirdropsController::class, 'index'])->name('airdrops');

// مسار صفحة بوتات التليجرام
// Route::get('/tbot', [TBotController::class, 'index'])->name(name: 'tbot.index');
Route::get('/tbot', [TBotController::class, 'index'])->name(name: 'tbot');


// مسارات صفحة Contact Us
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.us');
Route::post('/submit_contact', [ContactUsController::class, 'submit'])->name('contact.submit');

// مسار صفحة About Us
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.us');

/// مسار صفحة FAQ
Route::get('/faq', [FAQController::class, 'index'])->name('faq');

// مسار صفحة Terms & Conditions
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');

// مسار صفحة Privacy Policy
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy.policy');

// مسار صفحة Support
Route::get('/support', [SupportController::class, 'index'])->name('support');

// مسار معالجة نموذج Support
Route::post('/support', [SupportController::class, 'submit'])->name('support.submit');

// صفحة التسجيل
Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');

// معالجة نموذج التسجيل
Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');

// صفحة تسجيل الدخول
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// معالجة نموذج تسجيل الدخول
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// تسجيل الخروج
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// تسجيل الدخول الاجتماعي
Route::get('auth/{provider}', [AuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('auth/{provider}/callback', [AuthController::class, 'handleProviderCallback'])->name('social.callback');




// مسارات الموقع
/* Route::namespace('App\Http\Controllers\Website')->group(function () {
    // الصفحة الرئيسية
    Route::get('/', [HomeController::class, 'index'])->name('website.home');
    // Route::get('/token/{id}', [TokenController::class, 'show'])->name('website.token.show');
    
    // مسار الفحص عبر مكتبة Solana
    Route::post('/check-token', [HomeController::class, 'checkToken'])->name('website.checkToken');

    
    // مسار العملات المدرجة حديثًا
    Route::get('/newly-listed-currencies', [NewlyListedCurrencyController::class, 'index'])->name('website.home.newlyListedCurrencies.index');
    Route::get('/newly-listed-currencies/{id}', [NewlyListedCurrencyController::class, 'show'])->name('website.home.newlyListedCurrencies.show');
});
 */
