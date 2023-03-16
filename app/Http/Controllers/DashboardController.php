<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'current_version' => 'v10.0.0',
            'available_versions' => [
                'v10.1.0',
                'v10.2.0',
                'v10.3.0',
            ],
            'upgrade_status' => 'Success',
            'compatibility_check' => 'Compatible',
            'change_summary' => [
                'Added' => 5,
                'Modified' => 12,
                'Deleted' => 3,
            ],
            'version_history' => [
                [
                    'version' => 'v10.0.0',
                    'date' => '2023-02-15',
                ],
                [
                    'version' => 'v9.5.0',
                    'date' => '2023-01-10',
                ],
            ],
            'repository_info' => [
                'name' => 'my-laravel-project',
                'owner' => 'johndoe',
                'url' => 'https://github.com/johndoe/my-laravel-project',
            ],
        ];

        return view('dashboard', compact('data'));
    }
}
