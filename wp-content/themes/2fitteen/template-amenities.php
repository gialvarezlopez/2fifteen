<?php
    /*
     * Template Name: Template Amenities
     */
?>

<?php  get_header(); ?>

<?php $data = get_field("amenities_hero"); ?>
<?php $hero_is_active = $data['is_active']; ?>
<?php if( $hero_is_active ) { ?>
    <section class="full_bg  <?php echo ($data['apply_opacity'])?'bg_opacity':''; ?> " style="background: url('<?php echo $data['background']['sizes']['main_hero']; ?>'); background-repeat: no-repeat;
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


<?php $data = get_field('amenities_top_description'); ?>
<?php if($data !="") { ?>
    <section class="block_description">
        <p><?php echo $data; ?></p>
    </section>
<?php } ?>


<?php $data = get_field('amenities_features'); ?>
<?php if($data !="") { ?>
    <section class="holder_features_block">
        <ul>
            <?php $total = count($data['items']); $pros = 1; ?>
            <?php 
                foreach($data['items'] as $item => $key) 
                { 
                    if($total == $pros)
                    {
                        echo "<li>".$key['feature_name']."</li>"; 
                    }
                    else
                    {
                        echo "<li>".$key['feature_name']." | </li>"; 
                    }
                   
                    $pros++;
                } 
            ?>
        </ul>
    </section>
<?php } ?>        

<?php $data = get_field("amenities_block");?>
<?php if($data) { ?>
    <?php 
        foreach($data as $key => $value)
        {
            if($value['block_type'] == "grid"){
                if( isset($value['grid']['heading']) && $value['grid']['heading'] != "")
                {
                        ?>
                        <section class="block_description">
                            <p><?php echo $value['grid']['heading']; ?></p>
                        </section>
                        <?php
                }

                if( isset($value['grid']['row']) && count($value['grid']['row']) > 0 )
                {
                    foreach( $value['grid']['row'] as $keyRow => $valueRow )
                    {
                        if( $valueRow['content_position'] == "left")
                        {
                                ?>
                                <section class="row_grid">
                                        <div class="grid_content">
                                            <div>
                                                <?php if( $valueRow['title'] ) { ?>
                                                    <h1><?php echo $valueRow['title']; ?></h1>
                                                <?php } ?>
                                                <?php if($valueRow['description']) { ?>
                                                    <p><?php echo $valueRow['description']; ?> </p>
                                                <?php } ?>

                                                <?php if($valueRow['include_book_link']) { ?>
                                                    <?php $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>
                                                        <?php if($link_appointment) { ?>
                                                            <p>
                                                                <a href="<?php echo $link_appointment['url']; ?>" target="<?php echo $link_appointment['target']; ?>" class="btn btn-grid btn-open-booking"><?php echo $link_appointment['title']; ?></a>
                                                            </p>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="grid_image">
                                            <img src="<?php echo $valueRow['image']['sizes']['grid']; ?>" class="img-fluid">
                                        </div>
                                </section>
                                <?php
                        }
                        else
                        {   
                                ?>
                                <section class="row_grid">
                                    <div class="grid_image">
                                        <img src="<?php echo $valueRow['image']['sizes']['grid']; ?>" class="img-fluid">
                                    </div>
                                    <div class="grid_content">
                                        <div>
                                            <?php if( $valueRow['title'] ) { ?>
                                                <h1><?php echo $valueRow['title']; ?></h1>
                                            <?php } ?>
                                            <?php if($valueRow['description']) { ?>
                                                <p><?php echo $valueRow['description']; ?> </p>
                                            <?php } ?>

                                            <?php if($valueRow['include_book_link']) { ?>
                                                <?php $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>
                                                    <?php if($link_appointment) { ?>
                                                        <p>
                                                            <a href="<?php echo $link_appointment['url']; ?>" target="<?php echo $link_appointment['target']; ?>" class="btn btn-grid btn-open-booking"><?php echo $link_appointment['title']; ?></a>
                                                        </p>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </section>
                                <?php
                        }
                    }
                }
            }
            else //Full width banner
            {
                    $img_full = @$value['full_width']['background']['sizes']['main_hero'];
                    ?>
                    <section class="full_bg full_bg_common <?php echo ($value['full_width']['apply_opacity'])?'bg_opacity':''; ?> "  style="background: url('<?php echo $img_full; ?>'); background-repeat: no-repeat;
                        background-position: center center;
                            background-size: cover;">
                            <div class="container">
                                <div class="container_heading_hero_common">
                                    <h1 class="heading_left"><?php echo $value['full_width']['heading']; ?></h1>   
                                    <h1 class="heading_right"><?php echo $value['full_width']['sub_heading']; ?>
                                        <?php if($value['full_width']['include_book_link']) { ?>
                                            <?php $link_appointment = @get_field("sg_links","option")['link_appointment']; ?>
                                                <?php if($link_appointment) { ?>
                                                    <p>
                                                        <a href="#" class="btn btn-full_bg_right btn-open-booking"><?php echo $link_appointment['title']; ?></a>
                                                    </p>
                                                <?php } ?>
                                        <?php } ?>
                                    </h1>
                                </div>
                            </div>
                    </section>
                    <?php
            }
        }    
    ?>       
<?php } ?>

    <?php $data = get_field("amenities_content_footer"); ?>
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