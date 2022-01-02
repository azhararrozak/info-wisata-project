@extends('template_admin.home_das')
@section('sub-judul', 'Postingan')
@section('content')
	<br>
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }}
		</div>
	@endif
	<a href="{{ route('post.create') }}" class="btn btn-success">Tambah Post Baru</a><br><br> 
	<table class="table table-bordered table-sm">
		<thead class="table-dark">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Judul Post</th>
				<th class="text-center">Kategori</th>
				<th class="text-center">Tags Dipilih</th>
				<th class="text-center">Penulis</th>
				<th class="text-center">Gambar</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($post as $result => $hasil)
			<tr>
				<td class="text-center">{{ $result+$post->firstitem() }}</td>
				<td class="text-center">{{ $hasil->judul }}</td>
				<td class="text-center">{{ $hasil->category->name }}</td>
				<td class="text-start">
					@foreach($hasil->tags as $tag)
					<ol class="list-group">
						<li class="list-group-item">{{ $tag->name }}</li>
					</ol>
					@endforeach
				</td>
				<td class="text-center">{{ $hasil->users->name }}</td>
				<td class="text-center"><img src="{{ asset($hasil->gambar) }}" style="width: 100px;"></td>
				<td class="text-center">
					<form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('post.edit', $hasil->id) }}" class="btn btn-primary">Edit</a>
						<button type="submit" class="btn btn-danger">Delete</button> 
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>		
	</table>
	{{ $post->links() }}
@endsection