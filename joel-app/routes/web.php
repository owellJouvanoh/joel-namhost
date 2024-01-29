<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Models\Currency;


Route::get('/', [SiteController::class, 'viewHome']);

Route::get('/get-rates', function () {
    return response()->json(\App\Models\Currency::getRates());
});

//Route::get('/get-rates', function () {
    //try {
       // return response()->json(Currency::getRates());
    //} catch (\Exception $e) {
      //  \Log::error($e);
       // return response()->json(['error' => 'An error occurred. Check the logs for details.'], 500);
    //}
//});

// You can keep any other existing routes here
