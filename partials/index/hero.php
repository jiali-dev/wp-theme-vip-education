<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>
<!-- ============================ Hero Banner  Start================================== -->
<div class="image-cover hero_banner hero-inner-2 shadow rlt" data-overlay="7">
    <div class="container">
        
        <div class="hero-caption small_wd mb-5">
            <h1 class="big-header-capt cl_2 mb-0">سامانه آموزشی آنلاین</h1>
            <p>هر موضوعی را در هر زمان مطالعه کنید. ده ها دوره آموزشی را با بهترین کیفیت در دسترس شماست !</p>
        </div>
        <!-- Type -->
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="banner-search shadow_high">
                    <div class="search_hero_wrapping">
                        <form <?php echo home_url( ) ?> method="get">
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-12 br-right">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="جستجو ..." />
                                            <img src="<?php echo JVE_IMAGES_URI . '/search.svg' ?>" class="search-icon" alt="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-3 col-sm-12 pl-0">
                                    <div class="form-group none">
                                        <input type="submit" class="btn search-btn full-width" value="جستجو">
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->
