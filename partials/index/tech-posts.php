<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>
<!-- ========================== post tech Section =============================== -->
<section class="min-sec">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading-flex">
                    <h2 class="pl-2">آخرین اخبار دنیای تکنولوژی</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
                    
           <?php get_template_part( 'loop/technology-loop', 'technology-loop' ) ?>
        
        </div>
    </div>
</section>
<!-- ========================== post tech Section =============================== -->
