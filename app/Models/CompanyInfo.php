<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'about',
        'vision',
        'mission',
        'logo',
        'address',
        'email',
        'phone',
        'whatsapp',
        'map_embed',
        'social_media',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];
}