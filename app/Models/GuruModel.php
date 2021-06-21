<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nama', 'telpon', 'alamat'];

    public function mapels()
    {
        return $this->hasMany('App\Models\MapelModel', 'guru_id');
    }
}
