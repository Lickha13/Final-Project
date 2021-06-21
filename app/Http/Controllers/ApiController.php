<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\MapelModel;

class ApiController extends Controller
{
    public function __construct()
    {
       $this->MapelModel = new MapelModel();
    }

    public function editnilai(Request $request, $id)
    {
        $siswa = \App\Models\SiswaModel::find($id);
        $siswa->mapels()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
