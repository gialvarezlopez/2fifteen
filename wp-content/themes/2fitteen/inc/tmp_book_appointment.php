<div id="holderPopupBooking" class="holderPopup" style="">
	<div class="contentPopup">
		<a href="#" id="closePopupBooking" class="closePopup"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close_modal.png"></a>
        
		<div class="content_body">
            <?php 
                $arrData = array("building"=>"2Fifteen");
                $res = setCurlPhp("GetAvailableUnits", $arrData);
                $arrUnits = ($res['Result']->AvailableUnits);
            ?>
            <br>
            <form id="form_booking" class="form_booking">
                <input type="text" id="booking_full_name" placeholder="Your Full Name" required autocomplete="off" class="input-booking">
                <!-- <input type="text" id="booking_last_name" placeholder="Your Last Name" required autocomplete="off" class="input-booking"> -->
                <input type="email" id="booking_email" placeholder="Your Email" required class="input-booking">

                <div class="holder_phone">
                    <div class="elem_1">Phone</div>
                    <div class="css-gmuwbf">
                        <p class="chakra-text css-p8h253">+1</p>
                        <input placeholder="" id="phone_part_1" class="phone-css-fields input-booking" value="" maxlength="3" required>
                        <p class="chakra-text css-654ino">-</p>
                        <input placeholder="" id="phone_part_2" class="phone-css-fields input-booking" value="" maxlength="3" required>
                        <p class="chakra-text css-654ino">-</p>
                        <input placeholder="" id="phone_part_3" class="phone-css-fields input-booking" value="" maxlength="4" required>
                    </div>    
                </div>
                
                
                <Select id="book_unit" name="book_unit" required>
                   <option value="" selected="true" disabled="disabled">Preferred Suite Size</option> 
                  <?php 
                    foreach($arrUnits as $item => $value)
                    {
                        ?>
                            <option value="<?php echo $value[0]; ?>"><?php echo $value[0]; ?></option>
                        <?php
                    }
                  ?>
                  
                </select>
                <input type="text" data-role="date" id="from" name="from" placeholder="Select a Date" disabled="disabled" class="input-booking" autocomplete="off" readonly>
                <div id="book_slots" class="text-center"></div>
                <input type="text" data-role="date" id="to" name="to" placeholder="Desired Move In Date" disabled="disabled" class="input-booking" autocomplete="off" readonly>         
                <div class="holderCheckboxs"><label><input type="checkbox" class="cboxs" id="cbox1" value="check_realtor_one"> <span>Are you a Realtor?</span></label></div><br>
                <div class="holderCheckboxs"><label><input type="checkbox" class="cboxs" id="cbox2" value="check_realtor_two"> <span>Are you working with a Realtor?</span></label></div><br>
                
                <div class="text-center"><button type="subtmit" id="sendMessageUnit" disabled>SUBMIT</button></div>    
            </form>
	    </div>
	</div>
</div>