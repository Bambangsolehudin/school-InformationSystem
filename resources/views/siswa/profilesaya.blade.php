@extends('layouts.master')		

@section('header')

@stop
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img width="100" src="{{auth()->user()->siswa->getAvatar()}}" class="img-circle img-thumbnail img-responsive" alt="Avatar">
										<h3 class="name">{{auth()->user()->siswa->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{auth()->user()->siswa->mapel->count()}} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												{{auth()->user()->siswa->rataRataNilai()}} <span>Rata-rata Nilai</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{auth()->user()->siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{auth()->user()->siswa->agama}}</span></li>
											<li>Alamat<span>{{auth()->user()->siswa->alamat}}</span></li>
											
										</ul>
									</div>
									<div class="profile-info">
										
									</div>
									<div class="profile-info">
										
									</div>
									<div class="text-center"></div>
									<div class="text-center"><a href="/siswa/{{auth()->user()->siswa->id}}/edit" class="btn btn-warning">Edit Siswa</a></div>
								</div>

								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- Button trigger modal -->
								
								<div class="panel">
								<div class="panel-heading">
									 @if (session('status'))
									    <div class="alert alert-success">
									        {{ session('status') }}
									    </div>
								 	 @endif	 
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Kode</th>
												<th>Nama</th>
												<th>Semester</th>
												<th>Nilai</th>
												<th>Guru</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach(auth()->user()->siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
											 	<td>{{$mapel->semester}}</td>
												<td>{{$mapel->pivot->nilai}}</td>
												<td> {{$mapel->guru->nama}} </td>
												
											</tr>
											@endforeach
										
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel">
								<div id="chartNilai">
									 
								</div>
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