<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\MapelModel;
use Illuminate\Database\Eloquent\MapelSiswaModel;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan', 'nama_depan', 'jenis_kelamin', 'agama', 'alamat', 'avatar'];
    
    public function allData()
    {
        return DB::table('siswa')->get();
    }

    public function addData($data)
    {
        DB::table('siswa')->insert($data);
    }

    public function detailData($id)
    {
        return DB::table('siswa')->where('id', $id)->first();
    }

    public function editData($id, $data)
    {
        return DB::table('siswa')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return DB::table('siswa')->where('id', $id)->delete();
    }

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.png');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapels()
    {
        return $this->belongsToMany('App\Models\MapelModel', 'mapel_siswa', 'siswa_id', 'mapel_id')->withPivot('nilai')->withTimeStamps();
    }

    public function rataRataNilai()
    {
       //ambil nilai2
       if (count($this->mapels) === 0) {
        return 0;
       }

       $total = 0;
       $hitung = 0;
       foreach($this->mapels as $mapel){
           $total = $total + $mapel->pivot->nilai;
           $hitung++;
       }
       return round($total/$hitung);
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

    public function totalSiswa()
    {
        return SiswaModel::count();
    }
}
