<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'parish_name',
        'parish_address',
        'parish_city',
        'parish_website',
        'parish_diocese',
        'plan',
        'status',
        'mensaje',
    ];
}
