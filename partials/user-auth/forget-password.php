<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

$passwordRecoveryToken = ( isset($_GET['passwordRecoveryToken']) && !empty($_GET['passwordRecoveryToken']) ) ? sanitize_text_field( $_GET['passwordRecoveryToken'] ) : ''; 

?>

<?php if( $passwordRecoveryToken && !is_user_logged_in(  )): ?>
    <script>
        jQuery(function($) {
            "use strict";
            $('#forget-password').modal("show");
        })
    </script>
<?php endif; ?>
<!-- Log In Modal -->
<div class="modal fade" id="forget-password" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title"><?php $passwordRecoveryToken ? _e('Set new password', 'jve' ) : _e('Forget password', 'jve' ) ?></h4>
                <?php if( !$passwordRecoveryToken ): ?>
                    <div class="forget-password-form">
                        <form class="jve-forget-password-form">
                        
                            <div class="form-group">
                                <label><?php _e('Email', 'jve' ) ?></label>
                                <input type="text" class="form-control" name="email" placeholder="<?php _e('Email', 'jve' ) ?>">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login jve-pop-login"><?php _e('Get password recovery link', 'jve' ) ?></button>
                            </div>

                        </form>
                    </div>
                <?php else: ?>
                    <div class="new-password-form">
                        <form class="jve-new-password-form">
                        
                            <div class="form-group">
                                <label><?php _e('Password', 'jve' ) ?></label>
                                <input type="password" class="form-control" name="password" placeholder="*******">
                            </div>
                                
                            <div class="form-group">
                                <label><?php _e('Repeat password', 'jve' ) ?></label>
                                <input type="password" class="form-control" name="repeat-password" placeholder="*******">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="password-recovery-token" value="<?php echo $passwordRecoveryToken ?>">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login jve-pop-login"><?php _e('Sign in', 'jve' ) ?></button>
                            </div>

                            <div class="alert alert-danger"><?php _e('More than 8 characters including scpecial character, number and capital letter.', 'jve' ) ?></div>

                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
     