@extends('front.content')

@section('isi')

    @foreach ($data as $isi_post)

    <!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url( {{asset($isi_post->gambar) }} );" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="">{{ $isi_post->categories->name }}</a>
						</div>
						<h1> {{ $isi_post->judul }}</h1>
						<ul class="post-meta">
							<li><a href="">{{ $isi_post->users->name}}</a></li>
							<li>{{ $isi_post->created_at }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
    <div class="col-md-8 hot-post-left">
    <br>
        <div class="section-row">
 
    {{ $isi_post->content }}
    
    </div>
@endforeach
</div>

@endsection