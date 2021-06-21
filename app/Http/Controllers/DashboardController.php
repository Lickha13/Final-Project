<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use App\Models\GuruModel;

class DashboardController extends Controller
{
    function index()
    {
        $siswa = SiswaModel::all();
        $guru = GuruModel::all();
        $totalSiswa = [];
        $siswa->map(function($s){
            $s->rataRataNilai = $s->rataRataNilai();
            return $s;
        });
        $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
        
        return view('dashboards/index',['siswa' => $siswa],['siswa' => $totalSiswa],['guru' => $guru]);
    }
}
