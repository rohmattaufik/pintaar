		<footer class="footer-area relative sky-bg" id="contact-page">
	        <div class="absolute footer-bg"></div>
	        <div class="footer-top">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
	                        <div class="page-title">
	                            <h2>Kelas apa yang ingin kamu pelajari?</h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
	                        <a href="https://goo.gl/forms/vp45FbvQRUgHbnTi1" target="_blank" class="btn btn-danger">Beritahu Kami Disini</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="footer-middle">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xs-12 col-sm-6 pull-right">
							<ul class="social-menu text-right x-left">
								<h4>Hubungi Kami</h4>
								<p>Jalan Kedoya Raya No.55 RT 01 RW 03</p>
								<p>Pondok Cina, Beji, Kota Depok, Jawa Barat 16424</p>

								<li><a href="https://www.facebook.com/pintaar101/" target="_blank"><i class="ti-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/pintaar101/" target="_blank"><i class="ti-instagram"></i></a></li>
								<li><a href="mailto:pintaar.bantuan@gmail.com"><i class="ti-email"></i></a></li>
								<li><a href="tel:081360341347"><i class="ti-comments"></i></a></li>

							</ul>

	                    </div>

	                    <div class="col-xs-12 col-sm-6">
	                    	<h4>Ingin menjadi pengajar di Pintaar?</h4>
	                    	<a href="https://goo.gl/forms/1gj7XCBjVWWYXGSA2" class="btn btn-danger">Daftar Disini</a>
	                    </div>
					 </div>
	            </div>
	        </div>


			<div class="footer-bottom">
			    <div class="container">
			        <div class="row">
			            <div class="col-xs-12 text-center">
			                <p>&copy; 2019. Designed by <a style="color:white;" href="https://colorlib.com">Colorlib</a> and modified by Pintaar.</p>
			            </div>
			        </div>
			    </div>
			</div>
		</footer>
	</body>

	<!--Vendor-JS-->
	<script src="{{ URL::asset('js/vendor_js/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ URL::asset('js/vendor_js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('js/vendor_js/modernizr-2.8.3.min.js') }}"></script>
	<!--Plugin-JS-->
	<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ URL::asset('js/contact-form.js') }}"></script>
	<script src="{{ URL::asset('js/jquery.parallax-1.1.3.js') }}"></script>
	<script src="{{ URL::asset('js/scrollUp.min.js') }}"></script>
	<script src="{{ URL::asset('js/magnific-popup.min.js') }}"></script>
	<script src="{{ URL::asset('js/wow.min.js') }}"></script>
	<!--Main-active-JS-->
	<script src="{{ URL::asset('js/main.js') }}"></script>

	@yield('extra-script')

	<script type="text/javascript">

		$(document).ready(function() {
		  var showChar = 65;
		  var ellipsestext = "...";
		  $('.thumbnail-nama-kelas').each(function() {
		    var content = $(this).html();

		    if(content.length > showChar) {
		      var c = content.substr(0, showChar);
		      var h = content.substr(showChar-1, content.length - showChar);
		      var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span>';
		      $(this).html(html);
		    }

		  });
		});

	</script>

</html>





