<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenantRequest;

class TenantRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'parish_name' => 'required|string|max:255',
            'parish_address' => 'nullable|string|max:255',
            'parish_city' => 'nullable|string|max:255',
            'parish_website' => 'nullable|url|max:255',
            'parish_diocese' => 'nullable|string|max:255',
            'plan' => 'required|string|in:Basico,Estandar,Diocesano',
            'mensaje' => 'nullable|string',
        ]);

        TenantRequest::create($request->only([
            'name',
            'email',
            'phone',
            'parish_name',
            'parish_address',
            'parish_city',
            'parish_website',
            'parish_diocese',
            'plan',
            'mensaje',
        ]));

        return redirect()->route('tenant-request.form')->with('success', 'Solicitud enviada correctamente. Te contactaremos pronto.');
    }
}
