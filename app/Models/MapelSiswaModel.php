<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MapelSiswaModel extends Model
{
    protected $table = 'mapel_siswa';
    protected $fillable = ['nilai'];

    public function allData()
    {
        return DB::table('mapel_siswa')->get();
    }
}
