@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(session ('sukses'))
						<div class="alert alert-success" role="alert">
							{{session('sukses')}}
						</div>
					@endif

					@if(session ('error'))
						<div class="alert alert-danger" role="alert">
							{{session('error')}}
						</div>
					@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="" class="img-circle" alt="Avatar">
										<h3 class="name">{{$guru->nama}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Telephone<span>{{$guru->telpon}}</span></li>
											<li>Alamat <span>{{$guru->alamat}}</span></li>
										</ul>
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran Yang Diajar Oleh Guru {{$guru->nama}}</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>MATA PELAJARAN</th>
												<th>SEMESTER</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($guru->mapels as $data)
											<tr>
												<td>{{ $data->nama }}</td>
												<td>{{ $data->semester }}</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
								<div class="panel">
									<div id="chartNilai"></div>
								</div>
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

@stop

@section('footer')

@stop