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
									<h3 class="panel-title">Add New Posts</h3>
										  	 
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-8">
											<form action="{{route('posts.create')}}" method="post" enctype="multipart/form-data">
									        @csrf
											  <div class="form-group{{$errors->has('title') ? 'has->error' : ''}} ">
											    <label for="exampleInputEmail1" >Title</label>
											    <input type="text" class="form-control"  placeholder="title" name="title" value="{{old('title')}}">

											    @if($errors->has('title'))
											    	<span class="help-block" style="color: red;">{{$errors->first('title')}}</span>
											    @endif
											  </div>

											  <div class="form-group ">
											    <label for="exampleFormControlTextarea1">Content</label>
											   <textarea class="form-control" id="content" rows="3" name="content" >{{old('content')}}</textarea>
											  </div>


										</div>
										<div class="col-md-4">
											<div class="input-group">
											   <span class="input-group-btn">
											     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
											       <i class="fa fa-picture-o"></i> Choose
											     </a>
											   </span>
											   <input id="thumbnail" class="form-control" type="text" name="thumbnail">
											 </div>
											 <img id="holder" style="margin-top:15px;max-height:100px;">
											 <div class="input-group">
											 	 <input type="submit" class="btn btn-info" value="Submit">
											 </div>
											
										</div>
									</form>
									</div>
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

@section('footer')
 <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script>
	    ClassicEditor
	        .create( document.querySelector( '#content' ) )
	        .catch( error => {
	            console.error( error );
	        });

	     $(document).ready(function(){
	     		$('#lfm').filemanager('image');
	     
	     	});
	         
	</script>



@stop
