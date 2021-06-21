<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SiswaModel;
use Illuminate\Database\Eloquent\MapelSiswaModel;
use Illuminate\Support\Facades\DB;

class MapelModel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode', 'nama', 'semester'];

    public function siswamodel()
    {
        return $this->belongsToMany(SiswaModel::class, 'mapel_siswa');
    }

    public function guru()
    {
        return $this->belongsTo(GuruModel::class);
    }

    
}
