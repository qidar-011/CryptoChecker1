<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * عرض صفحة FAQ.
     */
    public function index()
    {
        return view('website.faq.index');
    }
}
