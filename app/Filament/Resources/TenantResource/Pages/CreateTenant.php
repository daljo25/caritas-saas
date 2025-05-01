<?php

namespace App\Filament\Resources\TenantResource\Pages;

use App\Filament\Resources\TenantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    protected function afterCreate(): void
    {
        $tenant = $this->record;

        // Obtener los datos completos del formulario
        $formData = $this->form->getState();

        // Asociar dominio al tenant
        $tenant->domains()->create([
            'domain' => $formData['domain'],
        ]);

        // Ejecutar acciones dentro del contexto del tenant
        $tenant->run(function () use ($formData) {
            // Crear el usuario admin dentro del tenant
            User::create([
                'name' => $formData['admin_name'],
                'email' => $formData['admin_email'],
                'password' => Hash::make($formData['admin_password']),
            ]);
        });
    }
}
