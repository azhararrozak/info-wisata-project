@extends('template_admin.home_das')
@section('sub-judul', 'Tambah Tags')
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
	<form action="{{ route('tag.store') }}" method="post">
		@csrf
		<div class="mb-3">
		  <label>Masukkan Tags:</label>
		  <input type="text" class="form-control" name="name">
		</div>
		<div class="mb-3 d-grid gap-2">
		  <button class="btn btn-primary">Simpan</button>
		</div>
	</form>
@endsection