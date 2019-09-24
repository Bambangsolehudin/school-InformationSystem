@extends('layouts.master')		

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container">
				<div class="container-fluid	">
					<div class="row">
						<div class="col-md-10">					
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Data Siswa</h3>
								</div>
								<div class="panel-body">
									<form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
				        				@csrf
				        				<label for="exampleInputEmail1" >Nama Depan</label>
						                <input type="text" class="form-control"  placeholder="Nama Depan" name="nama_depan" value="{{$siswa->nama_depan}}"> <br>
										
										<label for="exampleInputEmail1">Nama Belakang</label>
						    			<input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" value="{{$siswa->nama_belakang}}"> <br>

						    			<label for="exampleForControlSelect1">Pilih Jenis Kelamin</label>
										<select class="form-control" name="jenis_kelamin">
							  			<option value="L" @if($siswa->jenis_kelamin=='L') selected @endif>Laki-laki</option>
							  	 		<option value="P" @if($siswa->jenis_kelamin=='P') selected @endif>Perempuan</option>
										</select> <br>

										<label for="exampleInputEmail1">Agama</label>
						    			<input type="text" class="form-control" placeholder="Agama" name="agama" value="{{$siswa->agama}}"> <br>

						    			<label for="exampleFormControlTextarea1">Alamat</label>
						   				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{$siswa->alamat}}</textarea> <br>

						   				<label for="exampleFormControlTextarea1">Avatar</label>
						   				<input type="file" name="avatar" class="form-control">
						   				<br>

						   				<button type="submit" class="btn btn-warning">Update</button>
					      
									</form>
									
										
								</div>
								</div>
							</div> 	
						</div>
					</div>
				</div>
			</div>
		</div>
@stop


@section('content1')
<div class="row">
		
			<div class="col-10">
			<div class="modal-body">
			        <form action="/siswa/{{$siswa->id}}/update" method="post">
			        @csrf
					  <div class="form-group">
					    <label for="exampleInputEmail1" >Nama Depan</label>
					    <input type="text" class="form-control"  placeholder="Nama Depan" name="nama_depan" value="{{$siswa->nama_depan}}">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Belakang</label>
					    <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" value="{{$siswa->nama_belakang}}">
					  </div>

					  <div class="form-group">
					    <label for="exampleForControlSelect1">Pilih Jenis Kelamin</label>
						<select class="form-control" name="jenis_kelamin">
						   <option value="Laki-laki" @if($siswa->jenis_kelamin=='L') selected @endif>Laki-laki</option>
						   <option value="Perempuan" @if($siswa->jenis_kelamin=='P') selected @endif>Perempuan</option>
						</select>
					  </div>
					 
					  <div class="form-group">
					    <label for="exampleInputEmail1">Agama</label>
					    <input type="text" class="form-control" placeholder="Agama" name="agama" value="{{$siswa->agama}}">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Alamat</label>
					   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{$siswa->alamat}}</textarea>
					  </div>
 					  
				             
					<button type="submit" class="btn btn-warning">Update</button>
				      
					</form>
			      </div>
			  </div>
			</div>

		
			
		

@endsection