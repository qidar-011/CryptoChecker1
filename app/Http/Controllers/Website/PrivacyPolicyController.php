<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * عرض صفحة Privacy Policy.
     */
    public function index()
    {
        return view('website.privacy.index');
    }
}
