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
                    <div class="sec-heading2 sec-heading-flex">
                        <div class="sec-left">
                            <h3>آخرین اخبار دنیای تکنولوژی</h3>
                        </div>
                        <div class="sec-right">
                            <?php FilterPosts::jve_show_filter("technology", "light", "black" ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row posts-container">
           <?php get_template_part( 'loop/technology-loop', 'technology-loop' ) ?>
        </div>
    </div>
</section>
<!-- ========================== post tech Section =============================== -->
