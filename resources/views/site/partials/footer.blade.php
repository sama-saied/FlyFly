<!-- ========================= FOOTER ========================= -->
<!--<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="./img/logo-light.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>{{ config('settings.footer_copyright_text') }}</p>
						<img src="frontdivi/img/cards.png" alt="">
					</div>
				</div>
				<div >
					
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>-->











<!-- ========================= FOOTER ========================= -->
<footer class="section-footer">
    <div class="container">
	<div class="footer-logo text-center">
				<a href="/"><img src="{{ asset('storage/'.config('settings.site_favicon')) }}" /></a>
			</div>
        <section class="footer-top padding-top">
            <div class="row">

			<aside class="col-sm-3 col-md-3 white">
			
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>{{ config('settings.footer_copyright_text') }}</p>
						
					</div>
				
			</aside>

                <div class="col-sm-3  col-md-3 white">
				<div class="footer-widget about-widget">

                    <h2 >Customer Services</h2>
                    <ul >
                        <li> <a href="#">Help center</a></li>
                        <li> <a href="#">Money refund</a></li>
                        <li> <a href="#">Terms and Policy</a></li>
                      
					</ul>

					<ul>
                        <li> <a href="#"> Our history </a></li>
                        <li> <a href="#"> How to buy </a></li>
                        <li> <a href="#"> Delivery and payment </a></li>
                        
					</ul>
					</div>
</div>
			
                <aside class="col-sm-3  col-md-3 white">
				<div class="footer-widget about-widget">

					<h2 class="">My Account</h2>
					@guest
                    <ul class="">
                        <li> <a href="{{ route('login') }}"> User Login </a></li>
						<li> <a href="{{ route('register') }}"> User register </a></li>
						
					</ul>
					@else
					<ul class="">
						<li> <a href="{{ route('logout') }}"
						onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form> 
                        <li> <a href="/profile"> Account Setting </a></li>
                        <li> <a href="{{ route('account.orders') }}"> My Orders </a></li>
                        
					</ul>
					@endguest
					</div>
				</aside>
            
              
                <aside class="col-sm-3">
				<div class="footer-widget contact-widget">
                    <article class="">
                        <h2 class="">Contacts</h2>
                        <p>
						    <div class="con-info">
							<span>ph.</span>
							<p>{{ config('settings.phone_num') }}
								</p>
							</div>
                            

							<div class="con-info">
							<span>F.</span>
							<p>{{ config('settings.fax') }}
								  </p>
							</div>
							

							<div class="con-info">
							<span>E.</span>
							<p>{{ config('settings.e-mail') }}
								</p>
						</div>
                        </p>
						</article>
</div>
                        <div class="btn-group white">
                            <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i
                                    class="fab fa-facebook-f  fa-fw"></i></a>
                            <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i
                                    class="fab fa-instagram  fa-fw"></i></a>
                            <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i
                                    class="fab fa-youtube  fa-fw"></i></a>
                            <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i
                                    class="fab fa-twitter  fa-fw"></i></a>
                        </div>
                    
                </aside>
            </div>
            <!-- row.// -->
            <br>
        </section>
        
        <!-- //footer-top -->
    </div>
    <!-- //container -->










		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
                <center>
					<a href="{{ route('admin.settings.insta')}}" class="instagram"><i class="fa fa-instagram" id="" ></i><span>instagram</span></a>
					<a href="{{ route('admin.settings.facebook')}}" class="facebook" ><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="{{ route('admin.settings.twitter')}}" class="twitter"><i class="fa fa-twitter" id=" "></i><span>twitter</span></a>
					<a href="{{ route('admin.settings.youtube')}}" class="youtube"><i class="fa fa-youtube" id=""></i><span>youtube</span></a>
                </center>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<!--<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>-->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
		</footer>
<!-- ========================= FOOTER END // ========================= -->
