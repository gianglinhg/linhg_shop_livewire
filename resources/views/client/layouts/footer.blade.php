<footer class="footer mt-4">
    <div class="container">
        <div class="footer__widgets">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="widget widget__about">
                        <h4 class="widget-title white">giới thiệu</h4>
                        <p class="widget__about-text">
                            LinhG shop là một website được viết hoàn toàn từ ngôn ngữ PHP, cụ
                            thể là framework Laravel và Livewire của Laravel
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="widget widget__newsletter">
                        <h4 class="widget-title white">Đăng ký để nhận thông tin</h4>

                        <form class="mc4wp-form">
                            <div class="mc4wp-form-fields">
                                <p><input type="email" id="form-footer"
                                        placeholder="Vui lòng nhập địa chỉ email của bạn" aria-label="Newsletter input">
                                </p>
                            </div>
                        </form>

                        <div class="socials socials--white mt-20">
                            <a href="#" class="facebook" aria-label="facebook"><i class="ui-facebook"></i></a>
                            <a href="#" class="twitter" aria-label="twitter"><i class="ui-twitter"></i></a>
                            <a href="#" class="snapchat" aria-label="snapchat"><i class="ui-snapchat"></i></a>
                            <a href="#" class="instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
                            <a href="#" class="pinterest" aria-label="pinterest"><i class="ui-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title white">help</h4>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Tract Order</a></li>
                            <li><a href="#">Returns &amp; Refunds</a></li>
                            <li><a href="#">Private Policy</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title white">information</h4>
                        <ul>
                            <li><a href="#">Our Stores</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Delivery Info</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Site Map</a></li>
                            <li><a href="#">Namira Reviews</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end container -->

    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-sm-center">
                    <span class="copyright">
                        &copy; 2023 Fashion shop by Giang Văn Linh
                    </span>
                </div>

                <div class="col-md-6 footer__payment-systems text-right text-sm-center mt-sml-10">
                    <i class="ui-paypal"></i>
                    <i class="ui-visa"></i>
                    <i class="ui-mastercard"></i>
                    <i class="ui-discover"></i>
                    <i class="ui-amex"></i>
                </div>
            </div>
        </div>
    </div> <!-- end bottom footer -->
</footer> <!-- end footer -->

<div id="back-to-top">
    <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
</div>

<!-- jQuery Scripts -->
<script type="text/javascript" src="{{asset('/template/client/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/template/client/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/template/client/js/easing.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/template/client/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/template/client/js/owl-carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/template/client/js/flickity.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/template/client/js/modernizr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/template/client/js/scripts.js')}}"></script>
@stack('scripts')