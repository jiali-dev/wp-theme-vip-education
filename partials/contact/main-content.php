<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- ============================ Agency List Start ================================== -->
<section class="bg-light">
			
    <div class="container">
    
        <!-- row Start -->
        <div class="row">
        
            <div class="col-lg-8 col-md-7">
                <form class="contact-form">
                    <div class="prc_wrap">
                        
                        <div class="prc_wrap_header">
                            <h4 class="property_block_title"><?php _e( 'Contact form', 'jve') ?></h4>
                        </div>
                        
                        <div class="prc_wrap-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label><?php _e( 'Full name', 'jve') ?></label>
                                        <input type="text" name="fullname" class="form-control simple">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label><?php _e( 'Email', 'jve') ?></label>
                                        <input type="email" name="email" class="form-control simple">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label><?php _e( 'Title', 'jve') ?></label>
                                <input type="text" name="title" class="form-control simple">
                            </div>
                            
                            <div class="form-group">
                                <label><?php _e( 'Message', 'jve') ?></label>
                                <textarea name="message" class="form-control simple"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-theme send-message-btn" type="submit">
                                    <?php _e( 'Send message', 'jve') ?> 
                                    <span class="m-1 jve-spinner"><i class="fa fa-spin fa-spinner"></i></span>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </form>          
            </div>
            
            <div class="col-lg-4 col-md-5">
            
                <div class="prc_wrap">
                    
                    <div class="prc_wrap_header">
                        <h4 class="property_block_title">راه های ارتباطی</h4>
                    </div>
                    
                    <div class="prc_wrap-body">
                        <div class="contact-info">
                    
                            <h2>در تماس باشید</h2>
                            <p>برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. </p>
                            
                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-home"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">آدرس ما</h4>
                                    ایران، تهران <br>خیابان سعادت آباد،<br> خیابان کاج شمال غربی
                                </div>
                            </div>
                            
                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">پست الکترونیکی</h4>
                                    support@example.com<br>example@gmail.com
                                </div>
                            </div>
                            
                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-mobile"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">شماره تماس</h4>
                                    (41) 123 521 458<br>+91 235 548 7548
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- /row -->		
        
    </div>
            
</section>
<!-- ============================ Agency List End ================================== -->

<!-- ============================== Start Newsletter ================================== -->
<section class="newsletter theme-bg inverse-theme">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <div class="text-center">
                    <h2>به جامعه هزاران دانشجو بپیوندید!</h2>
                    <p>به جامعه میلیونی دانشجویان ما بپیوندید و به هزاران ساعت آموزش در حوزه‌های گوناگون دسترسی داشته باشید.</p>
                    <form class="sup-form">
                        <input type="email" class="form-control sigmup-me" placeholder="ایمیل خود را وارد کنید..." required="required">
                        <input type="submit" class="btn btn-theme" value="عضویت">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End Newsletter =============================== -->
