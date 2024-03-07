<?php
    /*
     * Template Name: Template Home
     */
?>

<?php  get_header(); ?>

<?php $data = get_field("home_hero");?>
<?php $hero_is_active = $data['is_active']; ?>
<?php if( $hero_is_active ) { ?>
    <section class="full_bg <?php echo ($data['apply_opacity'])?'bg_opacity':''; ?>" style="background: url('<?php echo $data['background']['sizes']['main_hero']; ?>'); background-repeat: no-repeat;
        background-position: center center;
        background-size: cover; position: relative"
    >
        <div class="container">
            <?php include("inc/tmp_header.php"); ?>
            <div class="container_heading_hero">
                <?php if( isset($data['heading']) && $data['heading'] != "" ) { ?>
                    <h1 class="heading_left"><?php echo $data['heading']; ?> </h1>
                <?php } ?>
                
                <?php 
                    $message = get_field('sg_top_message', 'option');
                    if( $message )
                    {
                        ?>
                        <div style="" class='top_title'> 
                            <div class="top_message"><?php echo $message;  ?></div>
                        </div>    
                        <?php
                    }
                ?>

                <?php if( isset($data['sub_heading']) && $data['sub_heading'] != "" ) { ?>
                    <h1 class="heading_right"><?php echo $data['sub_heading']; ?> </h1>
                <?php } ?> 
            </div>
        </div>
    </section>

<?php }else{ ?>
    <section class="full_bg full_bg_no_bg" style="">
        <div class="container">
            <?php include("inc/tmp_header.php"); ?>
        </div>
    </section>
<?php } ?>  


    <?php $data = get_field("home_block");?>
    <?php if($data) { ?>
        <?php 
        foreach($data as $key => $value)
        {
            if($value['block_type'] == "medium"){
                $img_medium = @$value['medium_width']['image']['sizes']['medium_width'];
                ?>
                    <section class="just-container">
                        <div class="single-banner">
                            <?php if($img_medium) { ?>
                                <div>
                                    <img src="<?php echo $img_medium; ?>" class="img-fluid width100">
                                </div>
                            <?php } ?>
                            <div class="row-flex">
                                <div class="content-left">
                                    <h2><?php echo $value['medium_width']['title']; ?></h2>
                                </div>
                                <div class="content-right pangram">
                                    <h3><?php echo $value['medium_width']['description']; ?></h3>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
            }else{
                $img_full = @$value['full_width']['background']['sizes']['main_hero'];

               
                ?>
                    <section class="full_bg full_bg_common <?php echo ($value['full_width']['apply_opacity'])?'bg_opacity':''; ?>" style="background: url('<?php echo $img_full; ?>'); background-repeat: no-repeat;
                        background-position: center center;
                            background-size: cover;">
                            <div class="container">
                                <div class="container_heading_hero_common">
                                    <h1 class="heading_left"><?php echo $value['full_width']['heading']; ?></h1>   
                                    <h1 class="heading_right"><?php echo $value['full_width']['sub_heading']; ?></h1>
                                </div>
                            </div>
                    </section>
                <?php
            }
        } 
        ?>
  
    <?php } ?>  

    <?php $data = get_field("home_content_footer"); ?>
    <section id="footer_one">
        <div class="single-container">
            <?php $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>

            

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
                        <?php } ?>
                    </h1>
                </div>
            
            <div class="clear"></div>
        </div>
    </section>
<?php get_footer(); ?>

