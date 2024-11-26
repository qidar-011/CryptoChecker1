<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * عرض صفحة About Us.
     */
    public function index()
    {
        return view('website.aboutus.index');
    }
}
