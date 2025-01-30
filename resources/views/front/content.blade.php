	<!-- SECTION -->
    @include('front.head')
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
                @yield('isi')
                </div>
            @include('front.widget')

        </div>
    </div>

    @include('front.footer')