@extends('layouts.master')		

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
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
										<img src="images/default.png" class="img-circle img-thumbnail img-responsive" alt="Avatar">
										<h3 class="name">{{$guru->nama}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									
								</div>
								
									<div class="profile-info">
										 
									</div>
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
									<h3 class="panel-title">Mata Pelajaran yang diajarkan guru {{$guru->nama}}</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Semester</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($guru->mapel as $mapel)
											<tr>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												
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



