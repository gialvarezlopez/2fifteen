<?php
    /*
     * Template Name: Template Neighbourhood
     */
?>

<?php  get_header(); ?>

<?php $data = get_field("neighbourhood_hero"); ?>
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

        <?php $data = get_field('neighbourhood_top_description'); ?>
        <?php if($data !="") { ?>
            <section class="block_description">
                <p><?php echo $data; ?></p>
            </section>
        <?php } ?>


        <?php $data_map = get_field("gm_my_neighbourhood", "option");  ?>
	    <?php if($data_map) { ?>

            <?php 
				$main_location = $data_map['center_latlng'];//  get_field("gm_my_location", "option")['latlng'];
				$zoom = $data_map["zoom"];
                $myStyle = "gm_style_".$data_map["style"];

                $myStyle = get_field( "gm_style_".$data_map["style"],"option");
				$defaultIcon = $data_map["general_icon"]["url"];
				$key =  get_field("gm_key", "option");
				
                $itemsMaps = array();  
                
                
                $gm_items = $data_map['neighbourhoods'];
				if( isset($gm_items) && count($gm_items) > 0 )
				{
					$pros = 1;
					foreach($gm_items as $item => $value)
					{
                        //var_dump( $value);
						$icon_cat = @$value["custom_icon"]["url"];
						
						if( $icon_cat)
						{
							$icon = $icon_cat;
						}else{
							$icon = $defaultIcon;
						}
						

						$records = ($value['items']);
						if( count($records) > 0 )
						{
							
							foreach( $records as $i => $v)
							{
								array_push($itemsMaps, array("name"=>$v['name'], "latlng"=>$v['latlng'], "open_info_windows"=>$v['open_info_windows'], "icon"=>$icon ));
								$pros++;
							}
						}
					}
				}

                //var_dump($itemsMaps);
            ?>
            <section class="holderMap">
                <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyBa3ArTe4Le8wls83wzEZXp8Dcjvg7vijA&language=en"></script>-->
                <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key; ?>&libraries=places&language=en"></script>
                <div class="map" id="map"></div>
                <?php //include("inc/map_neighbourhood.php"); ?>
                <script type="text/javascript">
				var locations = [
					<?php 
					
						if( count($itemsMaps) > 0)
						{
							for($i=0; $i < count($itemsMaps); $i++)
							{
								$name = "\"".$itemsMaps[$i]["name"]."\"";
								$icon = "\"".$itemsMaps[$i]["icon"]."\"";
								echo "[" .$name. ", ".$itemsMaps[$i]["latlng"].", ".($i+1)." , ".$itemsMaps[$i]["open_info_windows"].", ".$icon." ],\n";
							}
							
						}
					?>
					/*
					['Coogee Beach', 151.259052, -33.923036, 5],
                        */
                    ];

                    myStyle = <?php echo ($myStyle); ?>;
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: <?php echo $zoom; ?>,
                        center: new google.maps.LatLng(<?php echo $main_location; ?>),
                        //mapTypeId: google.maps.MapTypeId.ROADMAP
                        styles: myStyle,
                    });

                    //var infowindow = new google.maps.InfoWindow();

                    var marker, i;
                    for (i = 0; i < locations.length; i++) { 
                        
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map,
                            icon: locations[i][5]
                        });

                        var infowindow = new google.maps.InfoWindow();
            

                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                        
                        /*
                        if( locations[i][4] == true ){
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                        */
                    }
			    </script>
            </section>
        <?php } ?>


        <?php $data = get_field("neighbourhood_block");?>
        <?php if($data) { ?>
            <?php 
                foreach($data as $key => $value)
                {
                    if($value['block_type'] == "grid")
                    {
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
                    else
                    {
                        $img_full = @$value['full_width']['background']['sizes']['main_hero'];
                        ?>
                        <section class="full_bg full_bg_common <?php echo ($value['full_width']['apply_opacity'])?'bg_opacity':''; ?>" style="background: url('<?php echo $img_full; ?>'); background-repeat: no-repeat;
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
  
    <?php $data = get_field("neighbourhood_content_footer"); ?>
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