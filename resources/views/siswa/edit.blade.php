@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Data Siswa</h3>
								</div>
								<div class="panel-body">
                                <form action="/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                                <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>laki-Laki</option>
                                                <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Agama</label>
                                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{ $siswa->agama }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $siswa->alamat }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Avatar</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>

                                     
                                            <button type="submit" class="btn btn-warning">Update</button>
                                </form>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
</div>
@stop