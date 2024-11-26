<?php

namespace App\Http\Controllers\Website;

use App\Models\Token;
use Illuminate\Http\Request;
use App\Models\NewlyListedCurrency;
use App\Http\Controllers\Controller;
use App\Services\TokenAnalysisService;
// use DegenFrens\SolanaRugChecker\RugChecker;
// use Degenfrends\SolanaRugChecker\RugChecke";
// use degenfrends/solana-rugchecker;




class HomeController extends Controller
{

    protected $tokenAnalysisService;

    public function __construct(TokenAnalysisService $tokenAnalysisService)
    {
        $this->tokenAnalysisService = $tokenAnalysisService;
    }

    public function index()
    {
       /*  // جلب العملات المدرجة حديثًا من قاعدة البيانات
        $newlyListedCurrencies = NewlyListedCurrency::all();

        // إذا لم توجد بيانات، قم بتمرير بيانات مؤقتة
        if ($newlyListedCurrencies->isEmpty()) {
            $newlyListedCurrencies = collect([
                (object)[
                    'id' => 1,
                    'logo_url' => 'https://cryptologos.cc/logos/serum-srm-logo.png',
                    'name' => 'Serum',
                    'symbol' => 'SRM',
                    'address' => 'So11111111111111111111111111111111111111112',
                    'network' => 'Solana',
                    'expected_price' => 3.25,
                    'total_supply' => 1000000000,
                    'circulating_supply' => 500000000,
                    'next_supply' => 50000000,
                    'lp_locked' => true,
                    'mint' => false,
                    'freeze' => false,
                    'jito' => 'Active',
                    'team_coins' => 50000000,
                    'ads_coins' => 25000000,
                    'security_percentage' => 90,
                    'listing_time' => 'Q3 2024',
                    'dex_listing' => true,
                ],
                // يمكنك إضافة المزيد من العملات المؤقتة هنا إذا رغبت
            ]);
        }

        return view('website.home.index', compact('newlyListedCurrencies'));
         */

         // بيانات مؤقتة لعملة Serum (SRM)
         $currency = (object)[
            'logo_url' => 'https://cryptologos.cc/logos/serum-srm-logo.png',
            'name' => 'Serum',
            'symbol' => 'SRM',
            'address' => 'So11111111111111111111111111111111111111112',
            'network' => 'Solana',
            'expected_price' => 3.25,
            'total_supply' => 1000000000,
            'circulating_supply' => 500000000,
            'next_supply' => 50000000,
            'lp_locked' => true,
            'mint' => false,
            'freeze' => false,
            'jito' => 'Active',
            'team_coins' => 50000000,
            'ads_coins' => 25000000,
            'security_percentage' => 90,
            'listing_time' => 'Q3 2024',
            'dex_listing' => true,
        ];

        return view('website.home.index', compact('currency'));
        
        /*  
        // جلب العملات المدرجة حديثًا من قاعدة البيانات
        $newlyListedCurrencies = NewlyListedCurrency::all();

        // إذا لم توجد بيانات، قم بتمرير بيانات مؤقتة
        if ($newlyListedCurrencies->isEmpty()) {
            $newlyListedCurrencies = collect([
                (object)[
                    'id' => 1,
                    'logo_url' => 'https://cryptologos.cc/logos/serum-srm-logo.png',
                    'name' => 'Serum',
                    'symbol' => 'SRM',
                    'address' => 'So11111111111111111111111111111111111111112',
                    'network' => 'Solana',
                    'expected_price' => 3.25,
                    'total_supply' => 1000000000,
                    'circulating_supply' => 500000000,
                    'next_supply' => 50000000,
                    'lp_locked' => true,
                    'mint' => false,
                    'freeze' => false,
                    'jito' => 'Active',
                    'team_coins' => 50000000,
                    'ads_coins' => 25000000,
                    'security_percentage' => 90,
                    'listing_time' => 'Q3 2024',
                    'dex_listing' => true,
                    'audit_results' => [
                        'security_audit' => 'Passed',
                        'contract_verified' => true,
                        'developer_team' => 'Experienced',
                    ],
                    'coin_rating' => [
                        'community' => 4.8,
                        'liquidity' => 4.5,
                        'project_quality' => 5.0,
                    ],
                ],
                // يمكنك إضافة المزيد من العملات المؤقتة هنا إذا رغبت
            ]);
        }

        return view('website.home.index', compact('newlyListedCurrencies'));
         */

        // جلب العملات المدرجة حديثًا
        // $newlyListedCurrencies = NewlyListedCurrency::all();
        // return view('website.home.index', compact('newlyListedCurrencies'));
        
        /* $newTokens = Token::latest()->take(10)->get(); // عرض أحدث 10 عملات
        return view('website.home.index', compact('newTokens')); */
    }

   
    /**
     * معالجة طلب الفحص ونقل المستخدم إلى صفحة نتائج الفحص.
     */
    public function checkToken(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'network' => 'required|string',
            'token_address' => 'required|string',
        ]);

        // جمع البيانات المدخلة
        $tokenAddress = $request->input('token_address');
        $network = $request->input('network');

        // التأكد من أن الشبكة هي سولانا
        if (strtolower($network) !== 'sol') {
            return redirect()->back()->withErrors(['network' => 'Only Solana network is supported.']);
        }

        // استدعاء خدمة الفحص
        try {
            $analysisResult = $this->tokenAnalysisService->analyze($tokenAddress);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error fetching token analysis: ' . $e->getMessage()]);
        }

        // التحقق من نجاح عملية الفحص
        if (!$analysisResult) {
            return redirect()->back()->withErrors(['error' => 'Failed to analyze the token.']);
        }

        // تمرير نتيجة التحليل إلى صفحة نتائج الفحص
        return view('website.analysisResults.index', compact('analysisResult'));
        

        // إجراء عملية الفحص باستخدام مكتبة Solana Rugchecker
        // $result = $this->performTokenAnalysis($token);

        // استدعاء خدمة الفحص
       /*  $analysisResult = $this->tokenAnalysisService->analyze($tokenAddress);
        if (!$analysisResult) {
            return redirect()->back()->withErrors(['error' => 'Failed to analyze the token.']);
        }
        return view('website.analysisResults.index', compact('analysisResult')); */

        /* $analysisResult = app(TokenAnalysisService::class)->analyze($tokenAddress);
        if (!$analysisResult) {
        return redirect()->back()->withErrors(['error' => 'Failed to analyze the token.']);
        }
        return view('website.analysisResults.index', compact('result'));
        */

    }


    private function performTokenAnalysis($token)
    {
        // استخدام مكتبة Solana Rugchecker للحصول على البيانات
        // قم باستدعاء الخدمات الخارجية هنا لجلب البيانات بناءً على التوكين المدخل

       /*  try {
            // استدعاء مكتبة RugChecker
            $rugChecker = new RugChecker();
            $tokenAnalysis = $rugChecker->analyzeToken($token);
    
            // تحويل البيانات القادمة من المكتبة إلى التنسيق المطلوب
            $result = [
                'name' => $tokenAnalysis->name,
                'symbol' => $tokenAnalysis->symbol,
                'network' => 'Solana',
                'expected_price' => $tokenAnalysis->expected_price,
                'growth_percentage' => $tokenAnalysis->growth_percentage,
                'total_supply' => $tokenAnalysis->total_supply,
                'circulating_supply' => $tokenAnalysis->circulating_supply,
                'max_supply' => $tokenAnalysis->max_supply,
                'market_cap' => $tokenAnalysis->market_cap,
                'liquidity' => $tokenAnalysis->liquidity,
                'lp_locked' => $tokenAnalysis->lp_locked ? 'Yes' : 'No',
                'top_holders' => $tokenAnalysis->top_holders,
                'mint' => $tokenAnalysis->mint ? 'Yes' : 'No',
                'freeze' => $tokenAnalysis->freeze ? 'Yes' : 'No',
                'jito' => $tokenAnalysis->jito,
                'audit_results' => [
                    'security_audit' => $tokenAnalysis->audit_results->security_audit ? 'Passed' : 'Failed',
                    'contract_verified' => $tokenAnalysis->audit_results->contract_verified ? 'Yes' : 'No',
                    'developer_team' => $tokenAnalysis->audit_results->developer_team
                ],
                'coin_rating' => [
                    'community' => $tokenAnalysis->coin_rating->community,
                    'liquidity' => $tokenAnalysis->coin_rating->liquidity,
                    'project_quality' => $tokenAnalysis->coin_rating->project_quality
                ],
            ];
    
            return $result;
        } catch (\Exception $e) {
            // في حال حدوث خطأ، نعرض رسالة خطأ للمستخدم
            return redirect()->route('website.home')->withErrors(['error' => 'Error fetching token analysis: ' . $e->getMessage()]);
        } */

        /* return [
            'name' => 'Serum',
            'symbol' => 'SRM',
            'network' => 'Solana',
            'expected_price' => '3.25',
            'growth_percentage' => '15%',
            'total_supply' => '1,000,000,000 SRM',
            'circulating_supply' => '500,000,000 SRM',
            'max_supply' => '1,500,000,000 SRM',
            'market_cap' => '$1,200,000,000',
            'liquidity' => '$100,000,000',
            'lp_locked' => 'Yes',
            'top_holders' => [
                'Wallet Address 1',
                'Wallet Address 2',
                'Wallet Address 3',
                'Wallet Address 4',
                'Wallet Address 5',
            ],
            'mint' => 'No',
            'freeze' => 'No',
            'jito' => 'Active',
            'audit_results' => [
                'security_audit' => 'Passed',
                'contract_verified' => 'Yes',
                'developer_team' => 'Experienced'
            ],
            'coin_rating' => [
                'community' => '4.5/5',
                'liquidity' => '4.2/5',
                'project_quality' => '4.8/5'
            ],
        ]; */
    }


    /**
     * Display a listing of the resource.
     */
    /* public function index()
    {
        //
        $newTokens = Token::latest()->take(5)->get();
        return view('website.home.index', compact('newTokens'));
    } */

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
