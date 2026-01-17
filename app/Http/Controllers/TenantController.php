<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Stancl\Tenancy\Database\Models\Tenant;
use App\Models\Tenant;
use Illuminate\Support\Facades\Artisan;

class TenantController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            // 'id' => 'required|string|unique:tenants,id',
            'name' => 'required|string',
        ]);

        $tenant = Tenant::create([
            // 'id' => $request->id,
            'name' => $request->name,
        ]);
        
        Artisan::call('tenants:migrate', [
            '--tenants' => [$tenant->id],
            '--force' => true,
        ]);
        
        return response()->json([
            'status' => 'Tenant created',
            'tenant' => [
                    'id'   => $tenant->id,
                    'name' => $request->name],
        ]);
    }
}
