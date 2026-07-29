<?php

namespace App\Services;

use App\Models\Partner;

class PartnerService
{
    public function getAll()
    {
        return Partner::all();
    }

    public function getPublic()
    {
        return Partner::select('id', 'company_name', 'project_name', 'image', 'website','icon')->get();
    }

    public function find($id)
    {
        return Partner::findOrFail($id);
    }
}