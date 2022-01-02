@extends('template_admin.home_das')
@section('sub-judul', 'Pengguna')
@section('content')
	<br>
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }}
		</div>
	@endif
	<a href="{{ route('user.create') }}" class="btn btn-success">Tambah Pengguna</a><br><br> 

	<table class="table table-bordered table-sm">
		<thead class="table-dark">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Nama Pengguna</th>
				<th class="text-center">Email</th>
				<th class="text-center">Tipe</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($user as $result => $hasil)
			<tr>
				<td class="text-center">{{ $result+$user->firstitem() }}</td>
				<td>{{ $hasil->name }}</td>
				<td>{{ $hasil->email }}</td>
				<td class="text-center">
					@if($hasil->tipe)
						Administrator
						@else
						Penulis
					@endif
				</td>
				<td class="text-center">
					<form action="{{ route('user.destroy', $hasil->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-primary">Edit</a>
						<button type="submit" class="btn btn-danger">Delete</button> 
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>		
	</table>
	{{ $user->links() }}

@endsection