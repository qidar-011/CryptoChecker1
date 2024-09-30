<?php

namespace App\Http\Controllers\Website;

use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TokenAnalysisService;

class HomeController extends Controller
{

    protected $tokenAnalysisService;

    public function __construct(TokenAnalysisService $tokenAnalysisService)
    {
        $this->tokenAnalysisService = $tokenAnalysisService;
    }

    public function index()
    {
        $newTokens = Token::latest()->take(10)->get(); // عرض أحدث 10 عملات
        return view('website.home.index', compact('newTokens'));
    }

    public function checkToken(Request $request)
    {
        $request->validate([
            'token_address' => 'required|string',
        ]);

        $tokenAddress = $request->input('token_address');
        $analysis = $this->tokenAnalysisService->analyze($tokenAddress);

        return view('website.analysisResults.index', compact('analysis'));
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $newTokens = Token::latest()->take(5)->get();
        return view('website.home.index', compact('newTokens'));
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
