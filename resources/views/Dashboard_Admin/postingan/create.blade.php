@extends('template_admin.home_das')
@section('sub-judul', 'Tambah Postingan')
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
	<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
		  <label>Judul Postingan:</label>
		  <input type="text" class="form-control" name="judul">
		</div>
		<div class="mb-3">
		  <label>Pilih Kategori:</label>
		  <select class="form-control" name="category_id">
		  	<option value="" holder>Pilih Kategori Pariwisata</option>
		  	@foreach($category as $result)
		  	<option value="{{ $result->id }}">{{ $result->name }}</option>
		 	@endforeach
		  </select>
		</div>
		<div class="mb-3">
		 	<label>Pilih Tags<span style="color: blue;"> (Boleh Pilih Lebih dari Satu)</span>:</label><br>
		  	<select class="js-example-basic-multiple form-select" name="tags[]" multiple="multiple">
		  		@foreach($tags as $tag)
				<option value="{{ $tag->id }}">{{ $tag->name }}</option>
			  	@endforeach
			</select>
		</div>
		<div class="mb-3">
		  <label>Tulis Konten:</label>
		  <textarea class="form-control" name="content" id="content"></textarea>
		</div>
		<div class="mb-3">
		  <label>Upload Foto:</label>
		  <input type="file" class="form-control" name="gambar">
		</div>
		<div class="mb-3 d-grid gap-2">
		  <button class="btn btn-primary">Simpan Post</button>
		</div>
	</form>
	
@endsection