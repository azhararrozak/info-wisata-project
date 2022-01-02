@extends('template_admin.home_das')
@section('sub-judul', 'Tags')
@section('content')
	<br>
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }}
		</div>
	@endif
	<a href="{{ route('tag.create') }}" class="btn btn-success">Tambah Tags</a><br><br> 

	<table class="table table-bordered table-sm">
		<thead class="table-dark">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Tags</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tag as $result => $hasil)
			<tr>
				<td class="text-center">{{ $result+$tag->firstitem() }}</td>
				<td>{{ $hasil->name }}</td>
				<td class="text-center">
					<form action="{{ route('tag.destroy', $hasil->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('tag.edit', $hasil->id) }}" class="btn btn-primary">Edit</a>
						<button type="submit" class="btn btn-danger">Delete</button> 
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>		
	</table>
	{{ $tag->links() }}

@endsection