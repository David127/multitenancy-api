<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

foreach (config('tenancy.central_domains') as $domain) {
  Route::domain($domain)->group(function () {
    // your actual routes
    Route::get('/', function () {
      return 'hola mundo';
    });

    Route::post('/tenant/{id}', function ($id) {
      return \App\Models\User::all();
    });
  });
}


