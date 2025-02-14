<div class="col-md-4">
    <!-- ad widget-->
    <div class="aside-widget text-center">
        <a href="#" style="display: inline-block;margin: auto;">
        </a>
    </div>
    <!-- /ad widget -->

    <!-- social widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Social Media</h2>
        </div>
        <div class="social-widget">
            <ul>
                <li>
                    <a href="#" class="social-facebook">
                        <i class="fa fa-facebook"></i>
                        <span>24K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-twitter">
                        <i class="fa fa-twitter"></i>
                        <span>24K<br>Followers</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-google-plus">
                        <i class="fa fa-google-plus"></i>
                        <span>24K<br>Followers</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Categories</h2>
        </div>
        <div class="category-widget">
            <ul>
                @foreach ($categories_widget as $hasil)
                <li><a href="{{ route('blog.categories', $hasil->slug)}}">{{ $hasil->name }} <span>{{ $hasil->posts->count()}}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /category widget -->

    <!-- newsletter widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Newsletter</h2>
        </div>
        <div class="newsletter-widget">
            <form>
                <p>Berikan Kritik dan Saran Anda Disini</p>
                <input class="input" name="newsletter" placeholder="Enter Your Email">
                <button class="primary-button">Submit</button>
            </form>
        </div>
    </div>
    <!-- /newsletter widget -->

    <!-- post widget -->
    <div class="aside-widget">
        <div class="section-title">
            <h2 class="title">Popular Posts</h2>
        </div>
        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href=""><img src="{{ asset('front/./img/widget-3.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="">Teknologi</a>
                </div>
                <h3 class="post-title"><a href="">Mengenal Teknologi AI Terbaru yang Mengubah Dunia Digital</a></h3>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href=""><img src="{{ asset('front/./img/widget-2.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="">SEO</a>
                </div>
                <h3 class="post-title"><a href="">5 Strategi SEO Terbaik untuk Meningkatkan Peringkat Website Anda di 2025</a></h3>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href=""><img src="{{ asset('front/./img/widget-4.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="c">Umum</a>
                </div>
                <h3 class="post-title"><a href="">Tips Mengelola Waktu agar Tetap Produktif di Tengah Kesibukan</a></h3>
            </div>
        </div>
        <!-- /post -->

        <!-- post -->
        <div class="post post-widget">
            <a class="post-img" href=""><img src="{{ asset('front/./img/widget-5.jpg') }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="">Entertaiment</a>
                </div>
                <h3 class="post-title"><a href="">5 Film Terbaru yang Wajib Ditonton di Tahun Ini</a></h3>
            </div>
        </div>
        <!-- /post -->
    </div>
    <!-- /post widget -->
</div>