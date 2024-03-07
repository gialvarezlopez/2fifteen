<?php
    /*
     * Template Name: Template Team
     */
?>

<?php  get_header(); ?>

<!-- Hero  -->
<?php $data = get_field("team_hero"); ?> 
<?php $hero_is_active = $data['is_active']; ?>
<?php if( $hero_is_active ) { ?>
    <section class="full_bg <?php echo ($data['apply_opacity'])?'bg_opacity':''; ?>" style="background: url('<?php echo $data['background']['sizes']['main_hero']; ?>'); background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;"
    >
        <div class="container">
            <?php include("inc/tmp_header.php"); ?>
            <div class="container_heading_hero">
                <?php if( isset($data['heading']) && $data['heading'] != "" ) { ?>
                    <h1 class="heading_left"><?php echo $data['heading']; ?> </h1>
                <?php } ?>
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


<!-- Top Description  -->
<?php $data = get_field('team_top_description'); ?>
<?php if($data !="") { ?>
    <section class="block_description">
        <p><?php echo $data; ?></p>
    </section>
<?php } ?>


<!-- Grid -->
<?php $data = get_field('team_grid'); ?>
<?php if($data !="") { ?>
    <section class="row_grid_team">
            <?php
                $pros = 1; 
                foreach($data as $item => $value)
                {
                    ?>
                    <div class="grid_content">
                        <div class="<?php echo ( $pros%2 !== 0 )?"info f_left":"info f_right"; ?>">
                            <div class="holder_logo"><img src="<?php echo $value['logo']['url']; ?>" class="img-fluid"></div>
                            <p><?php echo $value['description']; ?></p>
                        </div>
                    </div>
                    <?php
                    $pros++;
                }
            ?>
    </section>
<?php } ?>


<!-- Slider -->
<?php $data = get_field('team_slider'); ?>
<?php if($data !="" && $data['is_active'] && isset($data['items']) && count($data['items']) > 0 ) {?>
    <div class="set_container_jd-slider">
        <section class="jd-slider slider1">
            <div class="slide-inner">
                <div class="slide-area" style="margin:0px; padding:0px">
                <?php foreach($data['items'] as $item => $value ) { ?>
                    <div>
                        <section class="full_bg full_bg_common mb0 mt0 " style="background: url('<?php echo $value['image']['sizes']['main_hero']; ?>'); background-repeat: no-repeat;
                                background-position: center center;
                                    background-size: cover;"
                        >
                            <div class="container">
                                <div class="container_heading_hero_common">
                                    <h1 class="heading_slide_team"><?php echo $value['heading']; ?></h1>
                                </div>
                            </div>
                        </section>
                    </div>  
                <?php } ?>    
                </div>
            </div>
            <div class="controller">
                <a class="auto" href="#">
                    <i class="fas fa-play fa-xs"></i>
                    <i class="fas fa-pause fa-xs"></i>
                </a>
                <div class="single-container">
                    <div class="indicate-area"></div>
                </div>
            </div>
        </div>
    </div>    
<?php } ?>    


<?php $data = get_field("team_content_footer"); ?>
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