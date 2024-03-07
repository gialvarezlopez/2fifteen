
<div class="float-panel">
    <section id="top_bar"  data-top="0" data-scroll="100">
        <div class="content_top_bar">
            

            <?php $link_normal_top = @get_field("sg_links","option")['link_normal_top']; ?>
            <?php if($link_normal_top) { ?>
                <a href="<?php echo $link_normal_top['url']; ?>" target="<?php echo $link_normal_top['target']; ?>" class="item-top-menu">
                    <?php echo $link_normal_top['title']; ?>
                </a>
            <?php } ?>
            
            <?php $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>
            <?php if($link_appointment) { ?>
                <span class="item_fixed">
                    <a href="<?php echo $link_appointment['url']; ?>" target="<?php echo $link_appointment['target']; ?>" class="btn btn-top-bar btn-open-booking">
                        <?php echo $link_appointment['title']; ?>
                    </a>
                </span>
            <?php } ?>
        </div>
    </section>
    <header id="main_menu">
        <a href="<?php echo home_url(); ?>">
            <?php if( basename(get_permalink()) == "availability" || basename(get_permalink()) == "contact" || !$hero_is_active ) { ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_brown.png" class="logo_top">
            <?php }else{ ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.svg" class="logo_top">
            <?php } ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.svg" class="logo_white">
        </a>
        <div id="holder_items_menu">
            <div class="holder-icon-main-menu">
                <img class="icon-action-menu" id="icon-menu-open" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_open.svg">
                <img class="icon-action-menu" id="icon-menu-close" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_close.svg">
            </div>
            
            <div id="nav-parent">
                <div class="holderMenuItems" id="holderMenuItems">
                    <?php 
                        //Header Menu
                        $args = array(
                            'theme_location' => 'header-menu',
                            'menu_class'=>'h-menu',
                            'menu_id'=> '',
                            'add_li_class'  => 'nav-item'
                        );
                        wp_nav_menu($args);
                    ?>

                    <!-- Top menu passes to buttom-->
                    <div class="show-mobile-menu">
                        <hr>
                        <ul>
                            <li>
                                <?php $link_normal_top = @get_field("sg_links","option")['link_normal_top']; ?>
                                <?php if($link_normal_top) { ?>
                                    <a href="<?php echo $link_normal_top['url']; ?>" target="<?php echo $link_normal_top['target']; ?>" class="item-top-menu">
                                        <?php echo $link_normal_top['title']; ?>
                                    </a>
                                <?php } ?>
                            </li>

                            <li>
                                <?php $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>
                                <?php if($link_appointment) { ?>
                                    <span class="item_fixed">
                                        <a href="<?php echo $link_appointment['url']; ?>" target="<?php echo $link_appointment['target']; ?>" class="btn btn-top-bar btn-open-booking">
                                            <?php echo $link_appointment['title']; ?>
                                        </a>
                                    </span>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>   
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </header>
</div>