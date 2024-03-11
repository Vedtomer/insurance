<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function PrivacyPolicy(){
        return view('pages.privacy_policy');
    }
}
