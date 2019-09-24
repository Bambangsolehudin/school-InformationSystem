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
									<h3 class="panel-title">Data Siswa</h3>
									<div class="right">
										<a href="/siswa/exportexcel" class="btn btn-sm btn-primary"> Export Excel</a>
										<a href="/siswa/exportpdf" class="btn btn-sm btn-primary"> Export Pdf</a>


										<a href="#" class=" btn"  data-toggle="modal" data-target="#exampleModal">+</a>

									</div>
									
									 @if (session('status'))
									    <div class="alert alert-success">
									        {{ session('status') }}
									    </div>
								 	 @endif	 	 
								</div>
								<div class="panel-body">
									<table class="table" id="data_table">
										<thead>
											<tr>
												<th>Nama Lengkap</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data_siswa as $siswa)
											<tr>
												<td><a href="/siswa/{{$siswa->id}}/profile"> {{$siswa->nama_lengkap()}}</a></td>
												<td>{{$siswa->jenis_kelamin}}</td>
												<td>{{$siswa->agama}}</td>
												<td>{{$siswa->alamat}}</td>
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

	<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="/siswa/create" method="post" enctype="multipart/form-data">
			        @csrf
					  <div class="form-group{{$errors->has('nama_depan') ? 'has->error' : ''}} ">
					    <label for="exampleInputEmail1" >Nama Depan</label>
					    <input type="text" class="form-control"  placeholder="Nama Depan" name="nama_depan" value="{{old('nama_depan')}}">

					    @if($errors->has('nama_depan'))
					    	<span class="help-block" style="color: red;">{{$errors->first('nama_depan')}}</span>
					    @endif
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Belakang</label>
					    <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" value="{{old('nama_belakang')}}">
					  </div>

					   <div class="form-group{{$errors->has('email') ? 'has->error' : ''}}">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">

					     @if($errors->has('email'))
					    	<span class="help-block" style="color: red;">{{$errors->first('email')}}</span>
					    @endif
					  </div>

					  <div class="form-group{{$errors->has('jenis_kelamin') ? 'has->error' : ''}}">
					    <label for="exampleForControlSelect1">Pilih Jenis Kelamin</label>
						<select class="form-control"  name="jenis_kelamin">
						   <option value="L" >Laki-laki</option>
						   <option value="P">Perempuan</option>
						</select>

						 @if($errors->has('jenis_kelamin'))
					    	<span class="help-block" style="color: red;">{{$errors->first('jenis_kelamin')}}</span>
					    @endif
					  </div>
					 
					  <div class="form-group{{$errors->has('agama') ? 'has->error' : ''}}">
					    <label for="exampleInputEmail1">Agama</label>
					    <input type="text" class="form-control" placeholder="Agama" name="agama" value="{{old('agama')}}">

					    @if($errors->has('agama'))
					    	<span class="help-block" style="color: red;">{{$errors->first('agama')}}</span>
					    @endif
					  </div>

					  <div class="form-group ">
					    <label for="exampleFormControlTextarea1">Alamat</label>
					   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" >{{old('alamat')}}</textarea>
					  </div>

					  <div class="form-group{{$errors->has('avatar')? 'has->error': ''}}">
					  	<label for="exampleFormControlTextarea1">Avatar</label>
						<input type="file" name="avatar" class="form-control">						
						@if($errors->has('avatar'))
					    	<span class="help-block" style="color: red;">{{$errors->first('avatar')}}</span>
					    @endif
					  </div>

 					  <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
						<button type="submit" class="btn btn-primary">Submit</button>
				      </div>
					</form>
			      </div>
			    </div>
			  </div>

@stop

@section('footer')
<script>
	$(document).ready(function(){
		$('#data_table').DataTable()
	})
</script>
@stop

