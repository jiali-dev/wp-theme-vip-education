<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Sign Up Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="sign-up">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title"><?php _e('Sign up', 'jve') ?></h4>
                <div class="login-form">
                    <form class="jve-signup-form">
                    
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="<?php _e('Fullname', 'jve') ?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="<?php _e('Email', 'jve') ?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="<?php _e('Username', 'jve') ?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="*******">
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width pop-login"><?php _e('Sign up', 'jve') ?></button>
                        </div>
                    
                    </form>
                </div>
                
                <div class="text-center">
                    <p class="mt-3"><i class="ti-user ml-1"></i><?php _e('Do you have an account?', 'jve') ?><a href="javascript:void(0)" class="link jve-signin-link"><?php _e('Sign in', 'jve') ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->	
