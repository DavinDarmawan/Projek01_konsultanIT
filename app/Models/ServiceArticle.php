<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}