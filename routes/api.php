<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'hola mundo desde el app Root Tenant';
});

Route::post('crear-tenant', function(Request $request){
    $nombre = $request->nombre;
    $tenant = App\Models\Tenant::create(['id' => $nombre]);
    $tenant->domains()->create(['domain' => $nombre . '.localhost']);
    $tenant->run(function() {
        App\Models\User::factory()->times(5)->create();
    });
    return [
        'message' => 'success!!!',
        'tenant' => $nombre
    ];
});


