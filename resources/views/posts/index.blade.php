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
										<a href="{{route('posts.add')}}" class=" btn btn-sm btn-primary"> Add new Post</a>
									</div>			  	 
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
											@foreach($posts as $post)
											<tr>
												<td>{{$post->id}}</td>
												<td>{{$post->title}}</td>
												<td>{{$post->user->name}}</td>
											
												<td>
													<a href="{{route('site.single.post' ,$post->slug)}}" class="btn btn-info btn-sm">View</a>
													<a href="" class="btn btn-warning btn-sm">Edit</a>
													<a target="_blank" href="" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')">Delete</a>
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

