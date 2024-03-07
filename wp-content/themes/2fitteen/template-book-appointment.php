<?php
    /*
     * Template Name: Template Book an appointment
     */
?>

<?php  get_header(); ?>

<?php $data = get_field("book_hero"); ?>
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


<section class="single-container ">
    <div class="holder_heading_background pb30">
          <h1 class="heading"><?php the_title(); ?></h1>
          <div class="defaultContent"><?php the_content(); ?></div>

          <?php 
           
            $arrData = array("building"=>"2Fifteen");
            $res = setCurlPhp("GetAvailableUnits", $arrData);
            $arrUnits = ($res['Result']->AvailableUnits);
          ?>

          <form id="form_booking">
              <p><input type="text" placeholder="Your First Name"></p>
              <p><input type="text" placeholder="Your Last Name"></p>
              <p><input type="text" placeholder="Your Email"></p>
              <p><input type="text" placeholder="___-___-____" name="phone_number" id="phone_number"></p>  
              <div>Preferred Suite Size</div>
              <!--
              <Select id="book_unit" name="book_unit">
                  <?php 
                    foreach($arrUnits as $item => $value)
                    {
                        ?>
                            <option value="<?php echo $value[0]; ?>"><?php echo $value[0]; ?></option>
                        <?php
                    }
                  ?>
                  
              </select>
            <p><label for="from">Select a Date *</label>
                    <input type="text" id="from" name="from">
            </p>
            <div id="book_slots"></div>

            <p><label for="to">Desired Move In Date *</label>
                <input type="text" id="to" name="to">
            </p>
                -->
          </form>
    </div>
</section>

<?php get_footer(); ?>