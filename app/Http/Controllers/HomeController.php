<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Hari_model;
use App\Models\Jadwal;
use App\Models\Pelajaran_model;
use App\Models\Pengumuman_model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page_title = 'Home';

        $data = [
            [
                'nama' => 'Hari',
                'jumlah' => Hari_model::count(),
            ],
            [
                'nama' => 'Guru',
                'jumlah' => Guru::count(),
            ],
            [
                'nama' => 'Pelajaran',
                'jumlah' => Pelajaran_model::count(),
            ],
            [
                'nama' => 'Jadwal',
                'jumlah' => Jadwal::count(),
            ],
            [
                'nama' => 'Pengumuman',
                'jumlah' => Pengumuman_model::count(),
            ],
        ];
        return view('home', compact('page_title', 'data'));
    }
}
