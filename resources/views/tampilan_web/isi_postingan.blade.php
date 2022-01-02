@extends('template_infowisata.isi')
@section('isi_post')
@foreach($data as $isi_post)
	<h3 class="text-center fw-bold">{{ $isi_post->judul }}</h3>
	<!-- Isi Konten -->
	<div class="text-justify">
		{!! $isi_post->content !!}
	</div>
	<h6>Penulis: {{ $isi_post->users->name }} Dibuat: <span style="color: blue;">{{ $isi_post->created_at }}</span></h6>
@endforeach
@endsection