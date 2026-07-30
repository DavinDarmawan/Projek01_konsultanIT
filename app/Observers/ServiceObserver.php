<?php

namespace App\Observers;

use App\Models\Service;
use App\Helpers\ActivityLogger;

class ServiceObserver
{
    public function created(Service $service): void
    {
        ActivityLogger::log(
            'Service',
            'CREATE',
            $service->title,
            'Menambahkan service baru'
        );
    }

    public function updated(Service $service): void
    {
        ActivityLogger::log(
            'Service',
            'UPDATE',
            $service->title,
            'Mengubah service'
        );
    }

    public function deleted(Service $service): void
    {
        ActivityLogger::log(
            'Service',
            'DELETE',
            $service->title,
            'Menghapus service'
        );
    }
}