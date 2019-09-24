@extends('layouts.master')		
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container">
				<div class="container-fluid	">
					<div class="row">
						<div class="col-md-12">					
							<div class="panel">
								<!-- BASIC TABLE -->
								<div class="panel-heading">
									<h3 class="panel-title">Posts</h3>
									<div class="right">
										
										<a href="" class=" btn btn-sm btn-primary"> Add New Posts</a>

									</div>
									
									 @if (session('status'))
									    <div class="alert alert-success">
									        {{ session('status') }}
									    </div>
								 	 @endif	 	 
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>TITLE</th>
												<th>USER</th>
												
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data_siswa as $siswa)
											<tr>
												<td></td>
												
												<td>
													<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
													<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')">Delete</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
							</div>
							<!-- END BASIC TABLE -->
						</div>
						</div> 	
					</div>
				</div>
			</div>
		</div>
	</div>

	
@stop

