<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TokenAnalysisService;

class AnalysisController extends Controller
{

    protected $tokenAnalysisService;

    public function __construct(TokenAnalysisService $tokenAnalysisService)
    {
        $this->tokenAnalysisService = $tokenAnalysisService;
    }

    public function checkToken(Request $request)
    {
        $request->validate([
            'token_address' => 'required|string',
        ]);

        $tokenAddress = $request->input('token_address');
        $analysis = $this->tokenAnalysisService->analyze($tokenAddress);

        // يمكنك إضافة منطق إضافي لمعالجة النتائج إذا لزم الأمر

        return view('website.analysisResults.index', compact('analysis'));
    }
/*     protected $tokenAnalysisService;

    public function __construct(TokenAnalysisService $tokenAnalysisService)
    {
        $this->tokenAnalysisService = $tokenAnalysisService;
    }

    public function checkToken(Request $request)
    {
        $request->validate([
            'token_address' => 'required|string',
        ]);

        $tokenAddress = $request->input('token_address');
        $analysis = $this->tokenAnalysisService->analyze($tokenAddress);

        return view('website.analysisResults.index', compact('analysis'));
    } */

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
