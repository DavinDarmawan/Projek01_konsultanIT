<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $fillable = [
    'service_id',
    'title',
    'icon',
    'description'
];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}