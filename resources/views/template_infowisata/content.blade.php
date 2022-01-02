@include('template_infowisata.head')
<!-- Banner Image/Homepage -->
    <section id="Home">
    <div
      class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
    >
      <div class="content text-center">
        <h1 class="text-white text-uppercase fw-bold">
          Selamat Datang
        </h1>
        <h4 class="text-white fw-normal">
          Website ini menyediakan berbagai informasi pariwisata di indonesia
        </h4>
      </div>
    </div>
    </section>
<!-- INFO WISATA -->
    <section id="Wisata">
      <div class="container">
        <div class="title">
          <h1>WISATA</h1>
        </div>
        @yield('isi_post')
        </div>
    </section>
    @include('template_infowisata.about_contact')
    @include('template_infowisata.footer')