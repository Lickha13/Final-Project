<?php
use App\Models\SiswaModel;

function ranking5Besar()
{
    $siswa = SiswaModel::all();
        $siswa->map(function($s){
            $s->rataRataNilai = $s->rataRataNilai();
            return $s;
        });
        $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);

        return $siswa;
}