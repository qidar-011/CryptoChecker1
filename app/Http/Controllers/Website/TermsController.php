<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * عرض صفحة Terms & Conditions.
     */
    public function index()
    {
        return view('website.terms.index');
    }
}
