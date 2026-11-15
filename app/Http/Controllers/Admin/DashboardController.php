<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Cast;
use App\Models\Genre;
use App\Models\Peran;
use App\Models\Kritik;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'film' => Film::count(),
            'cast' => Cast::count(),
            'genre' => Genre::count(),
            'peran' => Peran::count(),
            'kritik' => Kritik::count(),
            'user' => User::count(),
        ];

        return view('admin.dashboard', compact('counts'));
    }
}
