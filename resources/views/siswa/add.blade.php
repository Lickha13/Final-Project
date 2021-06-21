@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Tambah Data Siswa</h3>
								</div>
								<div class="panel-body">
                                <form action="/siswa/insert" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                                            <div class="text-danger">
                                            @error('nama_depan')
                                                {{ $message }}
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                                            <div class="text-danger">
                                            @error('nama_belakang')
                                                {{ $message }}
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                                <option value="L">laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <div class="text-danger">
                                            @error('jenis_kelamin')
                                                {{ $message }}
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Agama</label>
                                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                                            <div class="text-danger">
                                            @error('agama')
                                                {{ $message }}
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            <div class="text-danger">
                                            @error('alamat')
                                                {{ $message }}
                                            @enderror
                                            </div>
                                        </div>
                                            <button type="submit" class="btn btn-warning">Tambahkan</button>
                                </form>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
</div>
@stop