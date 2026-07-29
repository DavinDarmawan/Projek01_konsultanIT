<?php

namespace App\Services;

use App\Models\Team;

class TeamService
{
    public function getAll()
    {
        return Team::all();
    }

    public function getPublic()
    {
        return Team::select('id', 'name', 'position', 'description', 'image', 'linkedin', 'instagram', 'github')->get();
    }

    public function find($id)
    {
        return Team::findOrFail($id);
    }
}