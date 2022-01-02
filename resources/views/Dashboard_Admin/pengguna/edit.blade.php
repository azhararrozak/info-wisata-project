@extends('template_admin.home_das')
@section('sub-judul', 'Edit Pengguna')
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
	<form action="{{ route('user.update', $user->id) }}" method="post">
		@csrf
		@method('patch')
		<div class="mb-3">
		  <label>Nama:</label>
		  <input type="text" class="form-control" name="name" value="{{ $user->name }}">
		</div> 
		<div class="mb-3">
		  <label>Email:</label>
		  <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
		</div>
		<div class="mb-3">
		  <label>Tipe Pengguna:</label>
		  <select class="form-control" name="tipe">
		  	<option value="" holder>Pilih Tipe</option>
		  	<option value="1"
		  		@if($user->tipe == 1)
		  			selected
		  		@endif
		  	>Administrator</option>
		  	<option value="0"
		  		@if($user->tipe == 0)
		  			selected
		  		@endif
		  	>Penulis</option>
		  </select>
		</div>
		<div class="mb-3">
		  <label>Password:</label>
		  <input type="password" class="form-control" name="password">
		</div>
		<div class="mb-3 d-grid gap-2">
		  <button class="btn btn-primary">Simpan Pengguna</button>
		</div>
	</form>
@endsection