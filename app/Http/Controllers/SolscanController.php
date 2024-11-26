<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SolanaService;
use Exception;

class SolscanController extends Controller
{
    protected $solanaService;

    public function __construct(SolanaService $solanaService)
    {
        $this->solanaService = $solanaService;
    }

    /**
     * عرض صفحة الفحص.
     */
    public function show()
    {
        // تم تصحيح اسم العرض هنا
        return view('solscan.index');
    }

    /**
     * معالجة طلب الفحص.
     */
    public function checkTransaction(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'tx' => 'required|string',
        ]);

        $tx = $request->input('tx');

        try {
            // استدعاء الخدمة لتحليل المعاملة
            $result = $this->solanaService->analyzeTransaction($tx);

            // التأكد من أن النتيجة تحتوي على البيانات المطلوبة
            if (!$result) {
                return back()->withErrors(['tx' => 'Unable to fetch transaction details.']);
            }

            // جلب البيانات الخام للعرض
            $rawData = $this->solanaService->getTransactionData($tx);

            // تمرير البيانات إلى العرض مع تصحيح أسماء العروض
            return view('solscan.result', [
                'base_address' => $result['base_address'],
                'freezeResult' => $result['freeze'],
                'bundleResult' => $result['bundle'],
                'liquidity'    => $result['liquidity'],
                'transactionDetails' => $rawData, // تمرير البيانات الخام
            ]);

        } catch (Exception $e) {
            // التعامل مع الأخطاء
            return back()->withErrors(['tx' => 'Unable to fetch transaction details: ' . $e->getMessage()]);
        }
    }

    /**
     * عرض البيانات الخام للمعاملة (للتصحيح فقط).
     */
    public function showRawData(Request $request)
    {
        $request->validate([
            'tx' => 'required|string',
        ]);

        $tx = $request->input('tx');

        try {
            $rawData = $this->solanaService->getTransactionData($tx);
            return view('solscan.raw', ['rawData' => $rawData]);
        } catch (Exception $e) {
            return back()->withErrors(['tx' => 'Unable to fetch raw transaction data: ' . $e->getMessage()]);
        }
    }
}
