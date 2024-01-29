<?php

namespace App\Http\Controllers;

use App\Models\Currency;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function viewHome()
    {
        return view('home');
    }

    // You can keep any other methods or add new ones here
}
