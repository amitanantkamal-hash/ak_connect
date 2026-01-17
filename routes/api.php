<!-- Created by Amit Pawar -->
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;

Route::get('/ping', function () {
    return 'API WORKING';
});

Route::post('/tenants', [TenantController::class, 'store']); 
Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});
// admin routes will be here 
Route::middleware(['auth:sanctum', 'admin'])->group(function () {

});

//tenant routes will be here 
Route::middleware(['auth:sanctum', 'tenant'])->group(function () {

});

