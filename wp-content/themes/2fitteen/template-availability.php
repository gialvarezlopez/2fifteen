<?php
    /*
     * Template Name: Template Availability
     */
?>

<?php  get_header(); ?>

<?php $data = get_field("availability_hero"); ?>
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


<?php 
    /*
    $token = "eyJhbGciOiJSUzI1NiIsImtpZCI6ImViYWMyYTEwZWM4MDFjMGFlYmM0OGNmZGJkZWFiYzUxIiwidHlwIjoiSldUIn0.eyJuYmYiOjE2MzIyMzk0OTksImV4cCI6MTYzMjg0NDI5OSwiaXNzIjoiaHR0cHM6Ly9ic3RrLXdhLXByZC1hcGktYXV0aC1jYWUtMDAuYXp1cmV3ZWJzaXRlcy5uZXQiLCJhdWQiOlsiaHR0cHM6Ly9ic3RrLXdhLXByZC1hcGktYXV0aC1jYWUtMDAuYXp1cmV3ZWJzaXRlcy5uZXQvcmVzb3VyY2VzIiwiYXBpdjIiXSwiY2xpZW50X2lkIjoid2lkZ2V0Iiwic3ViIjoiNDEwMDcwIiwiYXV0aF90aW1lIjoxNjMyMjM5NDk5LCJpZHAiOiJsb2NhbCIsIlVzZXJJZCI6IjQxMDA3MCIsIkFjY291bnRJZCI6Ijg3MSIsIklkZW50aXR5SWQiOiIzOTA2NjQiLCJVc2VyVHlwZVZhbHVlIjoiMSIsIklzT25seUFsbG93Q2FuY2VsUmVjdXJyaW5nUGF5bWVudHNMb2dpbiI6IkZhbHNlIiwic2NvcGUiOlsiYXBpdjIiLCJvZmZsaW5lX2FjY2VzcyJdLCJhbXIiOlsicHdkIl19.XLVAomnp4nsOz5qRfptlHbZ3jNhtKirnEJjZC52pn_9blSmCK5i0jt-9W0oyY3jPwgncqHssUoAgYDLAL5Wej3rK7sz3ZbwLMq47_dAoswzpVeVkf8gzHlmBU0k-DGk8x-WnelKvmWIu11TN8WvrwYB89qb1w_wVLoFIumGtAu3r1qSCi7OM1SSDUvs884tOoXlkXm_ZKi60D-lkwsbaw95_5QsGIGwgleAHCTrH3zN-ryCL8FCKj3U5czWrtUMfUswc5b-Fmf8_HBT76UAqC0FUJzgD7166aJ7BPx61D5pxYwD0-aasSiRuW5UOLzqwCqJFiG98RUh1sRkvsg6EeA";
    $authorization = "Authorization: Bearer ". $token;

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($result);
    $var_dump($res);
    */

    
?>

        
<section class="single-container">
        <div class="holder_heading_background">

            <?php $data = get_field("availability_content"); ?>
            <?php if( isset($data['heading']) && $data['heading'] !="" ) { ?>
                <h1 class="text-center"><?php echo $data['heading']; ?></h1>
            <?php } ?>
                    
            <?php if( isset($data['sub_heading']) && $data['sub_heading'] !="" ) { ?>
                <h2 class="text-center"><?php echo $data['sub_heading']; ?></h2>
            <?php } ?>
                    
            
            <?php $data = get_field("availability_bedrooms");?>
            <?php if($data && isset($data) && count($data) > 0 ) { ?>
                <div class="holders_btns_availability">
                    <div class="row_grid_btns">

                        <?php 
                            $pros = 1;
                            foreach($data as $item => $value)
                            {
                                ?>
                                <div class="grid_content">
                                    <div class="<?php echo ($pros%2 !== 0)?"f_left":"f_right"; ?>">
                                        <a href="<?php echo $value['links']['url']; ?>" target="<?php echo $value['links']['target']; ?>" class="btn btn-td"> 
                                            <?php echo $value['links']['title']; ?>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                $pros++;
                            }
                        ?>
                    </div>
                </div>
            <?php } ?>        
        </div>

        <?php $data = get_field("availability_units"); ?>

        <?php 
            function numberTowords($num)
            {
            
                $ones = array(
                    0 =>"ZERO",
                    1 => "ONE",
                    2 => "TWO",
                    3 => "THREE",
                    4 => "FOUR",
                    5 => "FIVE",
                    6 => "SIX",
                    7 => "SEVEN",
                    8 => "EIGHT",
                    9 => "NINE",
                    10 => "TEN",
                    11 => "ELEVEN",
                    12 => "TWELVE",
                    13 => "THIRTEEN",
                    14 => "FOURTEEN",
                    15 => "FIFTEEN",
                    16 => "SIXTEEN",
                    17 => "SEVENTEEN",
                    18 => "EIGHTEEN",
                    19 => "NINETEEN",
                    "014" => "FOURTEEN"
                );
                $tens = array( 
                    0 => "ZERO",
                    1 => "TEN",
                    2 => "TWENTY",
                    3 => "THIRTY", 
                    4 => "FORTY", 
                    5 => "FIFTY", 
                    6 => "SIXTY", 
                    7 => "SEVENTY", 
                    8 => "EIGHTY", 
                    9 => "NINETY" 
                ); 
                $hundreds = array( 
                    "HUNDRED", 
                    "THOUSAND", 
                    "MILLION", 
                    "BILLION", 
                    "TRILLION", 
                    "QUARDRILLION" 
                ); /*limit t quadrillion */
                $num = number_format($num,2,".",","); 
                $num_arr = explode(".",$num); 
                $wholenum = $num_arr[0]; 
                $decnum = $num_arr[1]; 
                $whole_arr = array_reverse(explode(",",$wholenum)); 
                krsort($whole_arr,1); 
                $rettxt = ""; 
                foreach($whole_arr as $key => $i)
                {
                    
                    while(substr($i,0,1)=="0")
                            $i=substr($i,1,5);
                    if($i < 20){ 
                        /* echo "getting:".$i; */
                        $rettxt .= $ones[$i]; 
                    }
                    elseif($i < 100)
                    { 
                        if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
                        if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
                    }
                    else
                    { 
                        if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
                        if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
                        if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
                    } 

                    if($key > 0){ 
                        $rettxt .= " ".$hundreds[$key]." "; 
                    }
                } 
                if($decnum > 0)
                {
                    $rettxt .= " and ";
                    if($decnum < 20){
                        $rettxt .= $ones[$decnum];
                    }
                    elseif($decnum < 100){
                        $rettxt .= $tens[substr($decnum,0,1)];
                        $rettxt .= " ".$ones[substr($decnum,1,1)];
                    }
                }
                return $rettxt;
            }
        ?>
        <div>
            <?php 
                $dataApi = getTokenBuildingStack();
                if( $dataApi )
                {
                    $token = $dataApi['accessToken'];
                    
                    
                    $name = trim($data['building_name']); //"90 Eastdale";
                    $dataApi = getDataBuildingStack($token);

                    $setArr = array();
                    if( $dataApi )
                    {
                        $buildings =( $dataApi['data']->buildings);
                        foreach($buildings as $value)
                        {
                            //echo strtolower($value->name)." - ".strtolower($name)."<br>";
                            if( strtolower($value->name) == strtolower($name) ){
                                $units = ($value->availableUnits);
                                if( count($units) > 0 )
                                {
                                    ?>
                                    <table class="table" id="table_availability">
                                        <thead role="rowgroup">
                                            <tr>
                                                <th>SUITE</th>
                                                <th>BED</th>
                                                <th>BATH</th>
                                                <!-- <th>DEN</th> -->
                                                <th>INT. SQFT</th>
                                                <th>EXT. SQFT</th>
                                                <th>STARTING FROM</th>
                                                <!--<th>POWDER ROOM</th>-->
                                                <th>FLOORPLAN</th>
                                                <th>VIEW </th>
                                                <th>INQUIRE</th>
                                            </tr>
                                        </thead>
                                        <body>
                                            <?php 
                                                foreach($units as $unit)
                                                {
                                                    
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php 
                                                                    //echo $unit->name; 
                                                                    //$converter=new NumbWordter();
                                                                    //echo $converter->convert($unit->name);
                                                                    echo ucfirst(strtolower(numberTowords($unit->name)));
                                                                    
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if( $unit->numberOfDiningRooms )
                                                                    {
                                                                        echo $unit->numberOfBedrooms." + Den"; 
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $unit->numberOfBedrooms; 
                                                                    }
                                                                    
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if( $unit->numberOfPowderRooms )
                                                                    {
                                                                        echo ($unit->numberOfBathrooms+0.5); 
                                                                    }else{
                                                                        echo ($unit->numberOfBathrooms); 
                                                                    }
                                                                    
                                                                ?>
                                                            </td>
                                                            <!-- <td><?php //echo $unit->numberOfDiningRooms; ?></td> -->
                                                            <td><?php echo $unit->size; ?></td>
                                                            <td><?php echo $unit->balconyAreaInSqft; ?></td>
                                                            <td><?php echo $unit->rent; ?></td>
                                                            <!-- <td><?php //echo $unit->numberOfPowderRooms; ?></td>-->
                                                            
                                                            <td class="nosort"
                                                                ><a target="_blank" href="<?php echo get_permalink( get_page_by_path( 'floorplan' ) )."?url=".$unit->floorPlanDownloadUrl; ?>"  class="btn btn-td">VIEW</a>
                                                                <a target="_blank" href="<?php echo $unit->floorPlanDownloadUrl; ?>"  class="btn btn-td">DOWNLOAD</a>
                                                            </td>
                                                            <td class="nosort">
                                                                <?php 
                                                                    $arrImag = array();
                                                                    if( count($unit->images) > 0 )
                                                                    {
                                                                        $pros = 1;
                                                                        foreach( $unit->images as $img){
                                                                            $arrImag["item_".$pros] = urlencode($img->urlPreview."||".$img->url);
                                                                            $pros++;
                                                                        }
                                                                    }
                                                                    $strenc = http_build_query($arrImag);
                                                                ?>
                                                                <!-- <a target="_blank" href="<?php echo home_url('availability/gallery'); ?>?u=<?php echo $unit->name; ?>&g=<?php echo count($unit->images)."&".$strenc; ?>" class="btn btn-td open-gallery">VIEW</a> -->
                                                                <a target="_blank" href="u=<?php echo $unit->name; ?>&g=<?php echo count($unit->images)."&".$strenc; ?>" class="btn btn-td open-gallery">VIEW</a>    
                                                            </td>
                                                            <td class="nosort">
                                                                <a href="#" class="btn btn-td modal-contact-availability" data-unit="<?php echo ucfirst(strtolower(numberTowords($unit->name))); ?>" data-destination="<?php echo base64_encode($data['destination_emails']); ?>">
                                                                    CONTACT
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                            ?>
                                        </body>
                                    </table>
                                    
                                    <?php
                                } 
                            }
                        }
                    }
                }
            ?>
   
        </div>

        <div class="holder_bottom_description">
            <?php $data = get_field("availability_content"); ?>
            <?php if( isset($data['bottom_description']) && $data['bottom_description'] !="" ) { ?>
                <?php echo $data['bottom_description']; ?>
            <?php } ?>
        </div>
</section>

<?php $data = get_field("availability_content_footer"); ?>
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


<div id="holderPopupAvailability" class="holderPopup">
	<div class="contentPopup">
		<a href="#" id="closePopupAvailability" class="closePopup"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close_modal.png"></a>
        
		<div class="content_body">
            <h2>Suite Selected: <span class="unitSelected"></span></h2>
            <br>
            <form id="form_unit" class="contact_unit">
                <input type="text" id="name" placeholder="Your Name" required autocomplete="off">
                <input type="email" id="email" placeholder="Your Email" required autocomplete="off">
                <input type="text" id="phone_number" placeholder="Your Phone Number" autocomplete="off">
                <textarea placeholder="Message" id="textMessageUnit"></textarea>
                <input type="hidden" id="inputUnit">
                <input type="hidden" id="destination" value="">
                <input type="hidden" id="page_id" value="<?php echo get_the_ID(); ?>">
                <?php wp_nonce_field( 'nonce_action_send_unit', 'nonce_unit' ); ?>
                <div class="text-center"><button type="subtmit" id="sendMessageUnit">SUBMIT</button></div>    
            </form>
	    </div>
	</div>
</div>


<div id="holderPopupGallery" class="holderPopup">
	<div class="contentPopup">
		<a href="#" id="closePopupGallery" class="closePopup"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close_modal.png"></a>
        <br><br>
		<div class="content_body" id="renderGallery">
            
	    </div>
	</div>
</div>

<?php get_footer(); ?>