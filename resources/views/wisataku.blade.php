@extends('template_infowisata.content')
@section('isi_post')
        <div class="row g-3">
        @foreach($data as $new_post)
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
              <a href="{{ route('post.isi_postingan', $new_post->slug) }}"><img src="{{ $new_post->gambar }}" class="card-img-top" /></a>
              <div class="card-body">
                <div class="card-category">
                	<a href="#">{{ $new_post->category->name }}</a>
                </div><br>
                <h5 class="card-title">{{ $new_post->judul }}</h5>
                <div class="text-center">
                <a href="{{ route('post.isi_postingan', $new_post->slug) }}" class="btn btn-info">Baca Selengkapnya</a>
                </div><br>
                <ul class="list-group">
                	<li class="list-group-item">{{ $new_post->users->name }} -- {{ $new_post->created_at->diffForHumans() }}</li>
                </ul>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        <br>
        <div class="text-center">
          <a href="#" class="btn btn-success">Lihat Lainnya</a>
        </div>
@endsection
      
    
