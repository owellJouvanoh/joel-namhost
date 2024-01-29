<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Currency extends Model
{
    public static function getRates()
    {
        $response = Http::get('https://www.completeapi.com/free_currencies.min.json');
        return $response->json();
        
    }
}