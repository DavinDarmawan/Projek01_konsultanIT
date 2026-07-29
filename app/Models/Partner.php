<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'company_name',
        'project_name',
        'image',
        'website',
        'icon'
    ];
}