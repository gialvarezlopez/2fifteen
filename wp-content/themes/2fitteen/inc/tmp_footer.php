<?php $data = get_field("sg_content","option"); ?>
<footer>
    <!--
    <section id="footer_one">
        <div class="single-container">
            <?php /* $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>

            

            <?php if(isset($data['heading_1']) && $data['heading_1'] != "") { ?>
                <h1><?php echo $data['heading_1']; ?></h1>
            <?php } ?>

            
                <div class="float-right text-right">
                    <h1>
                        <?php if(isset($data['heading_2']) && $data['heading_2'] != "") { ?>
                            <?php echo $data['heading_2']; ?>
                        <?php } ?>

                        <?php $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>
                        <?php if($link_appointment) { ?>
                        <br>
                            <a href="<?php echo $link_appointment['url']; ?>" target="<?php echo $link_appointment['target']; ?>" class="btn btn-footer btn-open-booking">
                                <?php echo $link_appointment['title']; ?>
                            </a>
                        <?php } */ ?>
                    </h1>
                </div>
            
            <div class="clear"></div>
        </div>
    </section>
    -->
    <section id="footer_two">
        <div class="single-container">
            <div id="holder_footer_two">
                <div id="f_s_block_left">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-1-logo_copper.png" class="img-fluid">
                    <a href="https://dbsdevelopments.ca" target="_blank" id="logo-dbs"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-2-logo_copper.png" class="img-fluid" ></a>
                </div>
                <div id="f_s_block_center">
                    <?php if(isset($data['address']) && $data['address'] != "") { ?>
                        <div>
                            <?php echo $data['address']; ?>
                        </div>
                    <?php } ?>
                </div>
                <div id="f_s_block_right">
                    

                    <?php if(isset($data['copyright']) && $data['copyright'] != "") { ?>
                        <div>
                            <?php echo $data['copyright']; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</footer>