<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Sign Up Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="sign-up">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">ثبت نام</h4>
                <div class="login-form">
                    <form>
                    
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="نام کامل">
                        </div>
                        
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="پست الکترونیکی">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="نام کاربری">
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="*******">
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width pop-login">ثبت نام</button>
                        </div>
                    
                    </form>
                </div>
                
                <div class="modal-divider"><span>یـا</span></div>
                <div class="social-login ntr mb-3">
                    <ul>
                        <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                    </ul>
                </div>
                
                <div class="text-center">
                    <p class="mt-3"><i class="ti-user ml-1"></i>آیا حساب کاربری دارید؟ <a href="#" class="link">ورود به حساب کاربری</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->	