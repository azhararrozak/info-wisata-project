@include('template_infowisata.head_isipost')
<!-- INFO WISATA -->
    @foreach($data as $isi_post)
    <div class="picture">
      <img src="{{ $isi_post->gambar }}" class="img-fluid">
    </div>
    @endforeach
    <section id="Wisata">
      <div class="container">
        @yield('isi_post')
        </div>
    </section>

@include('template_infowisata.footer')