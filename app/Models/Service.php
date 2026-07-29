<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'benefits',
        'technologies',
        'image',
        'status',
        'created_by'
    ];

    public function benefits()
{
    return $this->hasMany(Benefit::class);
}

public function technologies()
{
    return $this->hasMany(Technology::class);
}

public function articles()
{
    return $this->hasMany(ServiceArticle::class);
}

}