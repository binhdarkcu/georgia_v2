<div id="header-block" class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-4">
                <div class="site-branding">
                    <a href="<?php echo bloginfo('home')?>/">
                        <div class="site-icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="logo">
                            <img src="images/logo.png"/>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-7 col-lg-8 mobile-menu visible-xs visible-sm">
                <a href="javascript:void(0)" class="sb-toggle-left">
                    <i class="fa fa-navicon"></i>
                </a>
            </div>
            <div class="col-sm-6 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <div id="primary-menu" class="primary-menu <?php if(isset($_SESSION['user'])) echo 'loggedin';?>">
                	<div class="user-logined">ingelogd als <a href="#">jurgen van grieken</a></div>
                	<?php
						$nav = array(
							'theme_location'  => 'menu_top',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'header-menu sf-menu',
							'menu_id'         => 'header-menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						);
						
						wp_nav_menu( $nav );
					?>
                    <!--ul id="header-menu" class="header-menu sf-menu">
                        <li id="menu-item-1703" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-1703"><a href="#">Home</a></li>
                        <li id="menu-item-1703" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-1703"><a href="#">Over ons</a></li>
                        <li id="menu-item-1836" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1836">
                            <a href="http://demo.toko.press/eventica-tecpro/events/">Events</a>
                            <ul class="sub-menu">
                                <li id="menu-item-2081" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2081"><a href="http://demo.toko.press/eventica-tecpro/events/map/">OP DE KALENDER</a></li>
                                <li id="menu-item-2082" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2082"><a href="http://demo.toko.press/eventica-tecpro/events/photo/">EERSTVOLGENDE EVENTS</a></li>
                                <li id="menu-item-1840" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1840"><a href="http://demo.toko.press/eventica-tecpro/events/list/">VOORBIJE EVENTS</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-1702" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1702">
                            <a href="http://demo.toko.press/eventica-tecpro/shop/">LEDEN</a>
                        </li>
                        <li id="menu-item-1702" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1702">
                            <a href="http://demo.toko.press/eventica-tecpro/shop/">LOKATIES</a>
                        </li>
                        <li id="menu-item-1702" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1702">
                            <a href="http://demo.toko.press/eventica-tecpro/shop/">CONTACT</a>
                        </li>
                        <li id="menu-item-1702" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1702">
                            <a href="http://demo.toko.press/eventica-tecpro/shop/">LOGIN</a>
                        </li>
                        <li>
                        	<a class="wordt-lid" href="#">WORDT LID</a>
                        </li>
                    </ul-->
                </div>
            </div>

        </div>
    </div>
</div>