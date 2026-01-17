<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;

Route::get('/ping', function () {
    return 'API WORKING';
});

Route::post('/tenants', [TenantController::class, 'store']);
