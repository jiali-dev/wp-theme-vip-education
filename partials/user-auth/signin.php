<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title"><?php _e('Sign in', 'jve' ) ?></h4>
                <div class="login-form">
                    <form class="jve-signin-form">
                    
                        <div class="form-group">
                            <label><?php _e('Username or Email', 'jve' ) ?></label>
                            <input type="text" class="form-control" name="identifire" placeholder="<?php _e('Username or Email', 'jve' ) ?>">
                        </div>
                        
                        <div class="form-group">
                            <label><?php _e('Password', 'jve' ) ?></label>
                            <input type="password" class="form-control" name="password" placeholder="*******">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width pop-login jve-pop-login"><?php _e('Sign in', 'jve' ) ?></button>
                        </div>

                        <div class="form-group">
                            <label for="reg" class="checkbox-custom-label"><?php _e('Remeber me', 'jve' ) ?></label>
                            <input id="reg" name="remember" type="checkbox">
                        </div>

                    </form>
                </div>
                
                <div class="social-login mb-3">
                    <ul>
                        <li class="left"><a href="javascript:void(0)" class="theme-cl jve-forget-password-link"><?php _e('Forget password?', 'jve' ) ?></a></li>
                    </ul>
                </div>
                
                <div class="text-center">
                    <p class="mt-2"><?php _e('Don\'t you have an account?', 'jve' ) ?><a href="javascript:void(0)" class="link jve-signup-link"> <?php _e('Make an account!', 'jve' ) ?> </a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
    
     
