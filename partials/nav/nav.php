<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

?>

<!-- Start Navigation -->
<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="<?php echo home_url( ) ?>">
                    <img src="<?php echo JVE_IMAGES_URI . '/logo.png' ?>" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <?php wp_nav_menu( array(
                    'theme_location' => 'Primary',
                    'depth' => 2,
                    'container' => 'div',
                    // 'container-class' => 'nav-menus-wrapper',
                    // 'menu_class' => 'nav-menu',
                    'items_wrap'      => '<ul id="%1$s" class="nav-menu">%3$s</ul>',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) ) ?>
                <?php if( !is_user_logged_in(  ) ): ?>
                    <ul class="nav-menu nav-menu-social align-to-left">
                        
                        <li class="login_click light">
                            <a href="#" data-toggle="modal" data-target="#login">ورود</a>
                        </li>
                        <li class="login_click theme-bg">
                            <a href="#" data-toggle="modal" data-target="#signup">ثبت نام</a>
                        </li>

                    </ul>
                <?php else: ?>
                    <ul class="nav-menu align-to-left">
                
                        <li class="active"><a href="#"><img src="<?php echo JVE_IMAGES_URI . '/user-1.jpg' ?>" class="circle " width="30" alt=""> پروفایل<span class="submenu-indicator"></span></a>
                            <ul class="nav-dropdown nav-submenu">
                                <li><a href="dashboard.html">پنل مدیریت<span class="submenu-indicator"></span></a>
                                    <ul class="nav-dropdown nav-submenu">
                                        <li><a href="#">مدیریت دوره ها</a></li>
                                        <li><a href="#">مدیریت تیکت ها</a></li>
                                        <li><a href="#">مدیریت نظرات</a></li>
                                        <li><a href="#">مدیریت مطالب</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">داشبورد</a></li>
                                <li><a href="#">پروفایل من</a></li>
                                <li><a href="#">دوره های من</a></li>
                                <li><a href="<?php echo wp_logout_url( home_url( ) ) ?>">خروج</a></li>
                                
                            
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
            
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>