<?php

namespace App\Observers;

use App\Models\Portfolio;
use App\Helpers\ActivityLogger;

class PortfolioObserver
{
    public function created(Portfolio $portfolio): void
    {
        ActivityLogger::log(
            'Portfolio',
            'CREATE',
            $portfolio->title,
            'Menambahkan portfolio baru'
        );
    }

    public function updated(Portfolio $portfolio): void
    {
        ActivityLogger::log(
            'Portfolio',
            'UPDATE',
            $portfolio->title,
            'Mengubah portfolio'
        );
    }

    public function deleted(Portfolio $portfolio): void
    {
        ActivityLogger::log(
            'Portfolio',
            'DELETE',
            $portfolio->title,
            'Menghapus portfolio'
        );
    }
}