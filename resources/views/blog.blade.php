@extends('front.content')

@section('isi')

<!-- post -->
<div class="post post-thumb">
    <a class="post-img" href=""><img src="{{ asset('front/img/hot-post-1.jpg') }}" alt=""></a>
    <div class="post-body">
        <div class="post-category">
            <a href="">Bisnis</a>
        </div>
        <h3 class="post-title title-lg"><a href="">Cara Efektif Mengatur Keuangan di Tengah Krisis Ekonomi</a></h3>
        <ul class="post-meta">
            <li><a href="">Journalist</a></li>
            <li>28 Januari 2025</li>
        </ul>
    </div>
</div>
<!-- /post -->
</div>
<div class="col-md-4 hot-post-right"> 
    <!-- post -->
    <div class="post post-thumb">
        <a class="post-img" href=""><img src="{{ asset('front/img/hot-post-2.jpg') }}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="">Entertaiment</a>
            </div>
            <h3 class="post-title"><a href=""> Daftar Game Online Populer yang Seru Dimainkan Bersama Teman</a></h3>
            <ul class="post-meta">
                <li><a href="">Admin</a></li>
                <li>28 Januari 2025</li>
            </ul>
        </div>
    </div>
    <!-- /post -->

    <!-- post -->
    <div class="post post-thumb">
        <a class="post-img" href=""><img src="{{ asset('front/img/hot-post-3.jpg') }}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="">Umum</a>
            </div>
            <h3 class="post-title"><a href="">Tren Kuliner Sehat yang Sedang Digemari di Tahun Ini</a></h3>
            <ul class="post-meta">
                <li><a href="">Journalist</a></li>
                <li>29 Januari 2025</li>
            </ul>
        </div>
    </div>
    <!-- /post -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Postingan Terbaru</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach ($data as $post_terbaru)
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="{{ route('blog.isi', $post_terbaru->slug )}}">
                                <img src="{{ $post_terbaru->gambar }}" alt="" style="height: 200px">
                            </a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="#">{{ optional($post_terbaru->categories)->name ?? 'Kategori Tidak Tersedia' }}</a>
                                </div>
                                <h3 class="post-title"><a href="#">{{ $post_terbaru->judul }}</a></h3>
                                <ul class="post-meta">
                                    <li><a href="">{{ optional($post_terbaru->users)->name ?? 'Penulis Tidak Diketahui' }}</a></li>
                                    <li>{{ $post_terbaru->created_at ? $post_terbaru->created_at->diffForHumans() : 'Tanggal Tidak Tersedia' }}</li>
                                </ul>    
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- /row -->

@endsection
