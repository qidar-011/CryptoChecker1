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
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Website\PrivacyPolicyController;
use App\Http\Controllers\Website\NewlyListedCurrencyController;


/* Route::get('/', function () {
    return view('welcome');
}); */

// الصفحة الرئيسية الافتراضية
// Route::get('/', action: [HomeController::class, 'index'])->name('website.home');


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */




// require __DIR__.'/auth.php';



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




// مسارات لوحة التحكم
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name(name: 'dashboard.dashboard');
    Route::get('/new', [DashboardController::class, 'new'])->name('dashboard.new');
    Route::get('/tables', [DashboardController::class, 'tables'])->name('dashboard.tables');
    Route::get('/test', [DashboardController::class, 'test'])->name('dashboard.test');
});


/* Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
}); */

// Route::get('/dashboard', [DashboardController::class, 'index']);

/* Route::get('/dashboard', function () {
    return view('tables.blade.php');
}); */

// مسارات لوحة التحكم
// Route::prefix('dashboard')->middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
//     Route::get('/new', [DashboardController::class, 'new'])->name('dashboard.new');
//     Route::get('/tables', [DashboardController::class, 'tables'])->name('dashboard.tables');
//     Route::get('/test', [DashboardController::class, 'test'])->name('dashboard.test');
// });

/* 
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/tables', function () {
        return view('dashboard.tables');
    });

    Route::get('/', function () {
        return view('dashboard.dashboard');
    });

    Route::get('/new', function () {
        return view('dashboard.new');
    });

    Route::get('/test', function () {
        return view('dashboard.test');
    });
});
 */

/* Route::get('/tables', function () {
    return view('tables');
});

Route::get('/tables', function () {
    return view('dashboard.tables'); 
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/new', function () {
    return view('dashboard.new');
});

Route::get('/test', function () {
    return view('dashboard.test');
}); */

// Route::get('/dashboard',  action: [DashboardController::class,  'index'])->name('dashboard');
// Route::get('/new',  [DashboardController::class,  'new'])->name('new');
// Route::get('/tables',  function () { return view('dashboard.tables'); })->name('tables'); 
// Route::get('/test',  [DashboardController::class,  'test'])->name('test');

/* Route::get('/dashboard', function () {
    return view(view: 'dashboard');
}); */

// Route::get('/dashboard', [DashboardController::class, 'index']);

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
