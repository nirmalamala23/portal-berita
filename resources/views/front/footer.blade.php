<!-- FOOTER -->
<footer id="footer" class="footer-full">
    <!-- container -->
   
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <img src="{{ asset('front/./img/logo.png') }}" alt="" style="width: 150px; height: auto;">
                    </div>
                    <p>Jejak Berita adalah aplikasi yang dibuat khusus untuk mempermudah publikasi berita terkini di website.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Categories</h3>
                    <div class="category-widget">
                        <ul>
                        @foreach ($categories_widget as $hasil)
                            <li><a href="">{{ $hasil->name }} <span>{{ $hasil->posts->count()}}</span></a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5">
                <div class="footer-widget">
                    <h3 class="footer-title">Kirim Pesan</h3>
                    <div class="newsletter-widget">
                        <form>
                            <p>Berikan Kritik dan Saran Anda Disini</p>
                            <input class="input" name="newsletter" placeholder="Kirim Kritik & Saran">
                            <button class="primary-button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>

        <!-- row -->
        <div class="footer-bottom row">
            <div class="col-md-4 col-md-push-4">
                <div class="footer-copyright d-flex justify-content-center align-items-center" style="height: 100%;">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>         
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <style>
        .footer-full {
    width: 100%;
    
}

        </style>
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>

</body>
</html>

