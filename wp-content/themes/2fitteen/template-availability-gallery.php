<?php
    /*
     * Template Name: Template Availability Gallery
     */
?>

<?php  get_header(); ?>

<?php $data = get_field("availability_hero"); ?>
<?php $hero_is_active = $data['is_active']; ?>
<?php if( $hero_is_active ) { ?>
    <section class="full_bg" style="background: url('<?php echo $data['background']['sizes']['main_hero']; ?>'); background-repeat: no-repeat;
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

        

<?php 
    $u = $_GET['u']; 
    $totalItem = $_GET['g']; 
    $post_ID = get_the_ID();
    $parentpost_id = wp_get_post_parent_id( $post_ID ); 

    //exit();
?> 


<section class="single-container">
    <div class="holder_heading_background pb30">

        <h1 class="heading"><?php the_title(); ?>  - Unit: <?php echo $u; ?> </h1>
            <!-- <div class="defaultContent"><?php //the_content(); ?></div> -->
         <?php
                
            if( isset($u) && $u != "")
            {
                if( $totalItem > 0 )
                {
                    //$data = get_field("availability_units", $parentpost_id);
                        
                        //New Code
                        ?>
                        <div id="aniimated-thumbnials" class="grid_4">
                            <?php
                            for($i = 1; $i <= $totalItem; $i++)
                            {
                                $item = urldecode($_GET['item_'.$i]);
                                $item = explode("||", $item);
                                $preview = trim($item[0]);
                                $fullUrl = trim($item[1]);
                                ?>
                                    
                                        <a href="<?php echo $fullUrl; ?>">
                                            <img src="<?php echo $preview; ?>" class="img-fluid">
                                        </a>
                                    
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        
                        //Old code
                        /*
                        $isMath = false;
                        foreach($data as $item => $value)
                        {
                            if( $value['unit'] == $u )
                            {
                                $arrGallery = $value['view']['gallery'];
                                if(  isset($arrGallery) && count($arrGallery) > 0 )
                                {
                                    ?>
                                    <div id="aniimated-thumbnials" class="grid_4">
                                        <?php
                                        
                                        foreach($arrGallery as $itemImg => $valueImg)
                                        {
                                            ?>
                                            <!-- <div href="<?php //echo $valueImg['sizes']['large']; ?>"> -->
                                                <a href="<?php echo $valueImg['sizes']['large']; ?>">
                                                    <img src="<?php echo $valueImg['sizes']['thumbnials_gallery_medium']; ?>" class="img-fluid">
                                                </a>
                                            <!-- </div> -->
                                            <?php
                                        } 
                                        ?>
                                    </div>
                                    <?php
                                    $isMath = true;
                                }
                                break;
                            }
                        }


                        if( !$isMath )
                        {
                            ?>
                                <h1>Gallery is not available</h1>
                            <?php
                        }
                        */
                    //}
                } 
                else
                {
                    ?>
                        <h1>Gallery is not available</h1>
                    <?php
                }   
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        window.location.replace("<?php echo home_url('availability'); ?>");
                    </script>
                <?php  die("Redirecting...");

            }
                //var_dump($_POST);
            ?>        
    </div>
</section>


<?php $data = get_field("availability_content_footer",  $parentpost_id); ?>
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