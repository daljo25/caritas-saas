<?php

namespace App\Filament\Resources\TenantRequestResource\Pages;

use App\Filament\Resources\TenantRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTenantRequest extends CreateRecord
{
    protected static string $resource = TenantRequestResource::class;
}
