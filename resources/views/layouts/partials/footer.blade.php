		<footer class="footer-area relative sky-bg" id="contact-page">
	        <div class="absolute footer-bg"></div>
	        <div class="footer-top">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
	                        <div class="page-title">
	                            <h2>Beritahu kami apa yang ingin kamu pelajari</h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-xs-12 col-md-8 col-md-offset-2">
	                        <form action="process.php" id="contact-form" method="post" class="contact-form">
	                            <div class="form-double">
	                                <input type="text" id="form-name" name="form-name" placeholder="Nama" class="form-control" required="required">
	                                <input type="email" id="form-email" name="form-email" class="form-control" placeholder="Email" required="required">
	                            </div>
	                            <input type="text" id="form-subject" name="form-subject" class="form-control" placeholder="Kelas yang kamu inginkan">
	                            <button type="sibmit" class="button">Submit</button>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="footer-middle">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xs-12 col-sm-6 pull-right">
	                        <ul class="social-menu text-right x-left">
	                            <li><a href="#"><i class="ti-facebook"></i></a></li>
	                            <li><a href="#"><i class="ti-twitter"></i></a></li>
	                            <li><a href="#"><i class="ti-google"></i></a></li>
	                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
	                            <li><a href="#"><i class="ti-github"></i></a></li>
	                        </ul>
	                    </div>
	                    <div class="col-xs-12 col-sm-6">
	                        <p>“The expert at anything was once a beginner.” -Helen Hayes</p>
	                    </div>
	                </div>
	            </div>
	        </div>


			<div class="footer-bottom">
			    <div class="container">
			        <div class="row">
			            <div class="col-xs-12 text-center">
			                <p>&copy;Copyright 2018. Template made by <a style="color:white;" href="https://colorlib.com">Colorlib</a> and modified by Pintaar Team.</p>
			            </div>
			        </div>
			    </div>
			</div>
		</footer>
	</body>

	<!--Vendor-JS-->
	<script src="{{ URL::asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

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
	
</html>





