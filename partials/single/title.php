<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title"><?php the_title( ) ?></h1>
                    <nav aria-label="breadcrumb">
                        <?php Breadcrumb::jve_get_breadcrumb(); ?>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->	
