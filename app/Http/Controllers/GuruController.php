<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\MapelModel;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->MapelModel = new MapelModel();
    }
    //public function profile($id)
    //{
        //$guru = GuruModel::find($id);
        //return view('guru/profile',['guru' => $guru]);
    //}

    public function profile($id)
    {
        $guru = GuruModel::find($id);
        $mapel = MapelModel::all();
       
        return view('guru/profile',compact('guru', 'mapel'));
    }
}
