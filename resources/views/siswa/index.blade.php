@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
                                    <div class="right">
                                        <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export Excel</a>
                                        <a href="/siswa/exportpdf" class="btn btn-sm btn-danger">Export PDF</a>
                                        <a href="/siswa/add" class="btn btn-primary btn-sm">Tambah Siswa</a> <br>
                                        @if (session('pesan'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
										    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										    <i class="fa fa-check-circle"></i> Data Berhasil Ditambahkan !!!
									    </div>
                                        @endif
                                    </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                            <th>NO</th>
                                            <th>NAMA DEPAN</th>
                                            <th>NAMA BELAKANG</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>AGAMA</th>
                                            <th>ALAMAT</th>
                                            <th>RATA2 NILAI</th>
                                            <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($siswa as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="/siswa/{{$data->id}}/profile">{{ $data->nama_depan }}</a></td>
                                            <td><a href="/siswa/{{$data->id}}/profile">{{ $data->nama_belakang }}</a></td>
                                            <td>{{ $data->jenis_kelamin }}</td>
                                            <td>{{ $data->agama }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->rataRataNilai() }}</td>
                                            <td>
                                            <a href="/siswa/{{$data->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$data->id}}">Delete</a>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/siswa/add" method="POST">
                        {{csrf_field()}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                    <option value="L">laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
@stop

@section('footer')
    <script>
       $('.delete').click(function(){
            var siswa_id = $(this).attr('siswa-id');
            swal({
                title: "Yakin ?",
                text: "Mau dihapus data siswa ini ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/siswa/"+siswa_id+"/delete"
                } 
            });
       });
    </script>
@stop
                            


    

