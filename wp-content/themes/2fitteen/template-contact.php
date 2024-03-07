<?php
    /*
     * Template Name: Template Contact
     */
?>

<?php  get_header(); ?>

<?php $data = get_field("contact_hero"); ?>
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


<?php $data = get_field("contact_content"); ?>        
<section class="just-container">

    <?php if( isset($data['main_title']) && $data['main_title'] !="" ) { ?>
        <div class="holder_heading_background">
            <h1 class="text-center"><?php echo $data['main_title']; ?></h1>
        </div>
    <?php } ?>   

    <section class="row_grid_contact">
        <div class="grid_content">
            <div class="info f_left">

                <div class="block_info_contact">
                    <?php if( isset($data['heading_1']) && $data['heading_1'] !="" ) { ?>
                        <h3><?php echo $data['heading_1']; ?></h3>
                    <?php } ?>

                    <?php if( isset($data['sub_heading_1']) && $data['sub_heading_1'] !="" ) { ?>
                        <h1><?php echo $data['sub_heading_1']; ?></h1>
                    <?php } ?>

                    <?php if( isset($data['link']) ) { ?>
                        <a href="<?php //echo $data['link']['url']; ?>" target="<?php //echo $data['link']['target']; ?>"  class="btn btn-grid modal-contactpage"> <?php echo $data['link']['title']; ?> </a>
                    <?php } ?>

                    
                </div>

                <div class="block_info_contact">
                    <?php if( isset($data['heading_2']) && $data['heading_2'] !="" ) { ?>
                        <h3><?php echo $data['heading_2']; ?></h3>
                    <?php } ?>

                    <?php if( isset($data['sub_heading_2']) && $data['sub_heading_2'] !="" ) { ?>
                        <h1><?php echo $data['sub_heading_2']; ?></h1>
                    <?php } ?>
                </div>
                   
            </div>
        </div>

       

        <?php 
            $key =  get_field("gm_key", "option");
            //$data_map = []
            $data_map = get_field("gm_lcp_location","option"); 
            $stringLatlng = $data_map['latlng'];
            $arrLatlng = explode(",", $stringLatlng);
            $lat =  trim($arrLatlng[0]);
            $lng =  trim($arrLatlng[1]);           
            $myStyle = get_field("gm_style_".$data_map["style"], "option");
        ?>
        <div class="grid_content">
            <div class="info f_right">
                <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyBa3ArTe4Le8wls83wzEZXp8Dcjvg7vijA&language=en"></script> -->
                <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key; ?>&libraries=places&language=en"></script>
                <div class="map_contact" id="map_contact"></div>
                <script>
                    let map_contact;
                    function initMapContact() {
                        if( jQuery("#map_contact").length == 1 )
                        {
                            let myStyle = <?php echo $myStyle; ?>;
                            const mapOptions = {
                                zoom: <?php echo $data_map['zoom']; ?>,
                                center: { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
                                styles : myStyle
                            };
                            map_contact = new google.maps.Map(document.getElementById("map_contact"), mapOptions);
                            const marker = new google.maps.Marker({
                                // The below line is equivalent to writing:
                                // position: new google.maps.LatLng(-34.397, 150.644)
                                position: { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
                                map: map_contact,
                                icon: "<?php echo $data_map['icon']["url"]; ?>"//"https://maps.google.com/mapfiles/marker_grey.png",
                            });
                            // You can use a LatLng literal in place of a google.maps.LatLng object when
                            // creating the Marker object. Once the Marker object is instantiated, its
                            // position will be available as a google.maps.LatLng object. In this case,
                            // we retrieve the marker's position using the
                            // google.maps.LatLng.getPosition() method.
                            const infowindow = new google.maps.InfoWindow({
                            content: "<p>Marker Location:" + marker.getPosition() + "</p>",
                            });
                            google.maps.event.addListener(marker, "click", () => {
                            infowindow.open(map_contact, marker);
                            });
                        }
                    }

                    initMapContact();
                </script>
            </div>
        </div>
    </section>
</section>


<?php $data = get_field("contact_content_footer"); ?>
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


<div id="holderPopupContactPage" class="holderPopup">
	<div class="contentPopup contentPopupContactPage">
		<a href="#" id="closePopupContactPage" class="closePopup"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close_modal.png"></a>
        
		<div class="content_body">
           
            <?php $data = get_field("contact_content"); ?>
            <?php $posts = $data['form'];
                if( $posts ): 
                    foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) 
                        $cf7_id= $p->ID;
                        echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                    endforeach;
                endif; 
		    ?>
            <!--
            <form id="form_unit" class="contact_us">
                <input type="text" id="name" placeholder="Your Name" required autocomplete="off">
                <input type="email" id="email" placeholder="Your Email" required autocomplete="off">
                
                <textarea placeholder="Message" id="textMessageUnit" required></textarea>
                <input type="hidden" id="inputUnit">
                <input type="hidden" id="destination" value="">
                <input type="hidden" id="page_id" value="<?php //echo get_the_ID(); ?>">
                <?php //wp_nonce_field( 'nonce_action_send_unit', 'nonce_unit' ); ?>
                <div class="text-center"><button type="subtmit" id="sendMessageUnit">SUBMIT</button></div>    
            </form>
            -->
	    </div>
	</div>
</div>


<?php get_footer(); ?>