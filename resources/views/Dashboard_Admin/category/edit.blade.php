@extends('template_admin.home_das')
@section('sub-judul', 'Edit Kategori')
@section('content')

	@if(count($errors)>0)
		<div class="alert alert-danger" role="alert">
			@foreach($errors->all() as $error)
				{{ $error }}
			@endforeach
		</div>	
	@endif
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }}
		</div>
	@endif
	<form action="{{ route('category.update', $category->id) }}" method="post">
		@csrf
		<!-- Karena Update gunakan @method('patch/put') -->
		@method('patch')
		<div class="mb-3">
		  <label>Masukan Kategori Pariwisata:</label>
		  <input type="text" class="form-control" name="name" value="{{ $category->name }}">
		</div>
		<div class="mb-3 d-grid gap-2">
		  <button class="btn btn-primary">Simpan Kategori</button>
		</div>
	</form>
@endsection