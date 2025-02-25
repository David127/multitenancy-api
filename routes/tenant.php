<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\UserController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'api',
    // InitializeTenancyByDomain::class,
    InitializeTenancyByPath::class,
    // PreventAccessFromCentralDomains::class,
])->prefix('{tenant}')->group(function () {
    Route::get('usuarios', [UserController::class, 'index']);

    Route::get('usuarios/{user}', [UserController::class, 'show']);
});
