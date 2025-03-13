<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- ============================ posts Start ================================== -->
<section class="bg-light">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 mb-3">
                <div class="sec-heading2 sec-heading-flex">
                    <div class="sec-left">
                        <h3>مطالب آموزشی</h3>
                    </div>
                    <div class="sec-right">
                        <?php FilterPosts::jve_show_filter(); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                <div class="arrow_slide three_slide-dots arrow_middle" dir="rtl">
                    <?php get_template_part( 'loop/post-loop', 'post-loop' ) ?>
                </div>
            </div>
        </div>	
        <p class="text-center"><a href="#">همه مطالب</a></p>
    </div>

</section>

<!-- ============================ post End ================================== -->
