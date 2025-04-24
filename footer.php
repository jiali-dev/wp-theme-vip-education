<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>
            <!-- ============================ Footer Start ================================== -->
			<footer class="<?php echo is_front_page(  ) ? 'light-footer' : 'dark-footer skin-dark-footer' ?> ">
				<div>
					<div class="container">
						<div class="row">

							<div class="col-lg-3 col-md-3">
								<div class="footer-widget">
									<img src="<? echo is_front_page() ? JVE_IMAGES_URI . '/logo.png' : JVE_IMAGES_URI . '/logo-light.png' ?>" class="img-footer" alt="" />
									<div class="footer-add">
										<p>تهران، خیابان سعادت آباد، خیابان کاج</p>
										<p>+1 246-345-0695</p>
										<p>info@learnup.com</p>
									</div>

								</div>
							</div>
							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">لینک مفید</h4>
									<ul class="footer-menu">
										<li><a href="about-us.html">درباره ما</a></li>
										<li><a href="faq.html">سوالات متداول</a></li>
										<li><a href="checkout.html">تسویه حساب</a></li>
										<li><a href="contact.html">تماس با ما</a></li>
										<li><a href="blog.html">وبلاگ</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">دسته بندی</h4>
									<ul class="footer-menu">
										<li><a href="#">طراحی وب</a></li>
										<li><a href="#">شبکه و امنیت</a></li>
										<li><a href="#">برنامه نویسی وب</a></li>
										<li><a href="#">پایگاه داده</a></li>
										<li><a href="#">برنامه نویسی موبایل</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-2 col-md-3">
								<div class="footer-widget">
									<h4 class="widget-title">راهنما و پشتیبانی</h4>
									<ul class="footer-menu">
										<li><a href="#">اسناد</a></li>
										<li><a href="#">چت آنلاین</a></li>
										<li><a href="#">ارسال ایمیل</a></li>
										<li><a href="#">قوانین و شرایط</a></li>
										<li><a href="#">سوالات متداول</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-md-12">
								<div class="footer-widget">
									<h4 class="widget-title">دانلود اپلیکیشن</h4>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="lni-playstore theme-cl"></i>
											</div>
											<div class="os-app-caps">
												گوگل پلی
												<span>دریافت اپلیکیشن</span>
											</div>
										</div>
									</a>
									<a href="#" class="other-store-link">
										<div class="other-store-app">
											<div class="os-app-icon">
												<i class="lni-apple theme-cl"></i>
											</div>
											<div class="os-app-caps">
												اپ استور
												<span>دریافت اپلیکیشن</span>
											</div>
										</div>
									</a>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">

							<div class="col-lg-6 col-md-6">
								<p class="mb-0">© 2022 LearnUp ارائه شده توسط <a href="#">راست چین</a></p>
							</div>

							<div class="col-lg-6 col-md-6 text-left">
								<ul class="footer-bottom-social">
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
									<li><a href="#"><i class="ti-linkedin"></i></a></li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			<?php if( !is_user_logged_in(  )): ?>
			
				<?php get_template_part( 'partials/user-auth/signin', 'signin' ) ?>
				<?php get_template_part( 'partials/user-auth/signup', 'signup' ) ?>
				<?php get_template_part( 'partials/user-auth/forget-password', 'forget-password' ) ?>
			
			<?php endif; ?>

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- Insert Footer -->
        <?php wp_footer(  ); ?>
	</body>

</html>
