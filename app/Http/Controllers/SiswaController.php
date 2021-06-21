<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use App\Models\MapelModel; 
use App\Models\MapelSiswaModel;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->SiswaModel = new SiswaModel();
        $this->MapelModel = new MapelModel();
        $this->MapelSiswaModel = new MapelSiswaModel();
    }

    public function index()
    {
         $siswa = SiswaModel::all();
         $data = [
             'siswa'=> $this->SiswaModel->allData(),
         ];
         $total = [
            'siswa'=> $this->SiswaModel->rataRataNilai(),
         ];
         
         return view('siswa/index', compact('siswa', 'data', 'total'));
    }

    public function add()
    {
        return view('siswa/add');
        $data = [
            'nama_depan' => Request()->nama_depan,
            'nama_belakang' => Request()->nama_belakang,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'agama' => Request()->agama,
            'alamat' => Request()->alamat
        ];

        $this->SiswaModel->addData($data);
        return redirect()->route('siswa')->with('sukses', 'Data Berhasil Ditambahkan !!!');
    }

    public function insert()
    {
        Request()->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ],[
            'nama_depan.required' => 'Nama depan wajib diisi !!!',
            'nama_belakang.required' => 'Nama belakang wajib diisi !!!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi !!!',
            'agama.required' => 'Agama wajib diisi !!!',
            'alamat.required' => 'Alamat wajib diisi !!!',
        ]);

        $data = [
            'nama_depan' => Request()->nama_depan,
            'nama_belakang' => Request()->nama_belakang,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'agama' => Request()->agama,
            'alamat' => Request()->alamat,
        ];
        $this->SiswaModel->addData($data);
        return redirect()->route('siswa')->with('sukses', 'Data Berhasil Ditambahkan !!!');
    }

    public function edit($id)
    {
        if (!$this->SiswaModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'siswa'=> $this->SiswaModel->detailData($id),
        ];
        return view('siswa/edit', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'required|mimes:jpg,jpeg,bmp,png|max:1024'
        ],[
            'nama_depan.required' => 'Nama depan wajib diisi !!!',
            'nama_belakang.required' => 'Nama belakang wajib diisi !!!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi !!!',
            'agama.required' => 'Agama wajib diisi !!!',
            'alamat.required' => 'Alamat wajib diisi !!!',
            'avatar.required' => 'Avatar wajib diisi !!!'
        ]);

        if(Request()->avatar <> "") {
            $file = Request()->avatar;
        $fileName = Request()->id . '.' . $file->extension();
        $file->move(public_path('admin/assets/img/avatar'), $fileName);

        $data = [
            'nama_depan' => Request()->nama_depan,
            'nama_belakang' => Request()->nama_belakang,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'agama' => Request()->agama,
            'alamat' => Request()->alamat,
            'avatar' => $fileName,
        ];
        $this->SiswaModel->editData($id, $data);
        }else {
            $data = [
                'nama_depan' => Request()->nama_depan,
                'nama_belakang' => Request()->nama_belakang,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'agama' => Request()->agama,
                'alamat' => Request()->alamat,
            ];
            $this->SiswaModel->editData($id, $data);
        }
        return redirect()->route('siswa')->with('sukses', 'Data Berhasil Diupdate !!!');
    }

    public function delete($id)
    {
        $this->SiswaModel->deleteData($id);
        return redirect()->route('siswa')->with('sukses', 'Data Berhasil Dihapus !!!');
    }

    public function profile($id)
    {
        $siswa = SiswaModel::find($id);
        $matapelajaran = MapelModel::all();

        //Menyiapkan data untuk chart
        $categories = [];
        $nilai = [];

        foreach($matapelajaran as $mp) {
            if($siswa->mapels()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                $nilai[] = $siswa->mapels()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        }
        //dd(json_encode($categories));
        //dd(json_encode($data));
        //dd($data);
        return view('siswa/profile',compact('siswa', 'matapelajaran', 'categories', 'nilai'));
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = SiswaModel::where('id', $idsiswa)->first();
        if($siswa->mapels()->where('mapel_id',$request->mapel)->exists()){
            return redirect('siswa/'.$idsiswa.'/profile')->with('error', 'Data Mata Pelajaran Sudah ada !!!');
        }
        $siswa->mapels()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses', 'Data Nilai Berhasil Dimasukkan !!!');
    }

    public function deletenilai($idsiswa,$idmapel)
    {
        $siswa = SiswaModel::where('id', $idsiswa)->first();
        $siswa->mapels()->detach($idmapel);

        return redirect()->back()->with('sukses', 'Data Nilai Berhasil Dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = \App\Models\SiswaModel::all();
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa]);
        return $pdf->download('Siswa.pdf');
    }
    
}