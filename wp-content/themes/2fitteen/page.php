<?php  get_header(); ?>


<section class="full_bg full_bg_no_bg" style="">
        <div class="container">
            <?php include("inc/tmp_header.php"); ?>
        </div>
</section>

<section class="single-container ">
    <div class="holder_heading_background pb30">
          <h1 class="heading"><?php the_title(); ?></h1>
          <div class="defaultContent"><?php the_content(); ?></div>
    </div>
</section>

<?php
  //get_template_part('template_inc/inc','footer');
  get_footer();
?>