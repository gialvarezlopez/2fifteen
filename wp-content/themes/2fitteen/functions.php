<?php
//Implement Cookie with HTTPOnly and Secure flag in WordPress


function twofifteen_setup(){
	//Featured Image
	add_theme_support('post-thumbnails');

	//===================
	//Sizes custom
    //===================
    add_image_size('main_hero', 1600,948, true); //Crop with true //1500,848,
    add_image_size('medium_width', 1434,798, true); //Crop with true //1334,698
    add_image_size('grid', 882,660, true); //Crop with true
    add_image_size('thumbnials_gallery_small', 187,127, true); //Crop with true
    add_image_size('thumbnials_gallery_medium', 300,300, true); //Crop with true
    //add_image_size('thumbnials_gallery_large', 1200,800, true); //Crop with true
}

add_action('after_setup_theme','twofifteen_setup');



/* CSS and JS */
function twofifteen_styles(){
	//==============================
	//Add style page
	//==============================
    
    wp_enqueue_style("bootstrap","https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
	wp_enqueue_style("fonts", get_template_directory_uri().'/fonts/stylesheet.css',array(),'1.0.0');
    wp_enqueue_style("reset", get_template_directory_uri().'/css/reset.css',array(),'1.0.0');
    

    wp_enqueue_style("justifiedGallery.min.css", get_template_directory_uri().'/assets/lightgallery/static/css/justifiedGallery.min.css',array(),'1.0.0');
    wp_enqueue_style("css/lightgallery.css", get_template_directory_uri().'/assets/lightgallery/lightgallery/css/lightgallery.css',array(),'1.0.0');

    wp_enqueue_style("theme", get_template_directory_uri().'/css/theme.css',array(),'1.0.1.46');
	//wp_enqueue_style("theme", get_stylesheet_uri(),array(),'1.0.0');


	//==============================
	//jdSlider
	//==============================
	wp_enqueue_script('jdSlider',get_template_directory_uri()."/assets/Carousel-Slideshow-jdSlider/public/dist/js/jquery.jdSlider-latest.min.js", array('jquery'), '1.0.0', true);
    
    //Gallery
    wp_enqueue_script('prettify.js',get_template_directory_uri()."/assets/lightgallery/static/js/prettify.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('justifiedGallery.min.js',get_template_directory_uri()."/assets/lightgallery/static/js/jquery.justifiedGallery.min.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('transition.js',get_template_directory_uri()."/assets/lightgallery/static/js/transition.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('collapse.js',get_template_directory_uri()."/assets/lightgallery/static/js/collapse.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('lightgallery.js',get_template_directory_uri()."/assets/lightgallery/lightgallery/js/lightgallery.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('lg-fullscreen.js',get_template_directory_uri()."/assets/lightgallery/lightgallery/js/lg-fullscreen.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('lg-thumbnail.js',get_template_directory_uri()."/assets/lightgallery/lightgallery/js/lg-thumbnail.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('lg-video.js',get_template_directory_uri()."/assets/lightgallery/lightgallery/js/lg-video.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('lg-autoplay.js',get_template_directory_uri()."/assets/lightgallery/lightgallery/js/lg-autoplay.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('lg-zoom.js',get_template_directory_uri()."/assets/lightgallery/lightgallery/js/lg-zoom.js", array('jquery'), '1.0.0', true);
    wp_enqueue_script('mousewheel.min.js',get_template_directory_uri()."/assets/lightgallery/external/jquery.mousewheel.min.js", array('jquery'), '1.0.0', true);


    //Lazy Images
    wp_enqueue_script('jquery.lazy.min',get_template_directory_uri()."/assets/jquery.lazy/jquery.lazy.min.js", array('jquery'), '1.7.10', true);
    wp_enqueue_script('jquery.lazy.plugins.min.js',get_template_directory_uri()."/assets/jquery.lazy/jquery.lazy.plugins.min.js", array('jquery'), '1.7.10', true);


    //Sweet Alert
    wp_enqueue_script('sweetalert2',"https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js", array('jquery'), '1.0.0', true);

    //Jquery UI
    wp_enqueue_script('jquery-ui',"https://code.jquery.com/ui/1.12.1/jquery-ui.js", array('jquery'), '1.12.1', true);

    //DataTable
    wp_register_script('datatables', 'https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js', array('jquery'), true);
    wp_enqueue_script('datatables');

    wp_register_script('dataTables.fixedColumns_js', 'https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js', array('jquery'), true);
    wp_enqueue_script('dataTables.fixedColumns_js');

    //wp_register_script('datatables_buttons', 'https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js', array('jquery'), true);
    //wp_enqueue_script('datatables_buttons');

   // wp_register_script('datatables_jszip', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', array('jquery'), true);
    //wp_enqueue_script('datatables_jszip');
    
    //wp_register_script('datatables_pdfmake', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js', array('jquery'), true);
    //wp_enqueue_script('datatables_pdfmake');
    
    //wp_register_script('datatables_vfs_fonts', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js', array('jquery'), true);
    //wp_enqueue_script('datatables_vfs_fonts');
    
    //wp_register_script('datatables_html5', 'https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js', array('jquery'), true);
    //wp_enqueue_script('datatables_html5');
    
    //wp_register_script('datatables_print', 'https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js', array('jquery'), true);
    //wp_enqueue_script('datatables_print');

    wp_register_style('datatables_style', 'https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css');
    wp_enqueue_style('datatables_style');

    //wp_register_style('datatables_fixedColumns_css', 'https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css');
    //wp_enqueue_style('datatables_fixedColumns_css');

    //inputmask
    //wp_enqueue_script('inputmask.js',get_template_directory_uri()."/assets/inputmask.min.js", array('jquery'), '1.0.0', true);

    
    //==============================
	//Main Scripts
	//==============================
    wp_enqueue_script('scripts',get_template_directory_uri()."/js/script.js", array('jquery'), '1.0.11', true);


    //Ajax
	wp_localize_script( 'scripts', 'ajax_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
        'action_contact_unit' => 'twofifteen_contact_unit',
        'action_open_gallery' => 'twofifteen_open_gallery',
        'action_getAvailableTime' => 'twofifteen_getAvailableTime',
        'action_send_booking' => 'twofifteen_send_booking',
        'max_date' => get_field('sg_book_an_appointment', 'option')['max_date']
    ) );
    
}
add_action("wp_enqueue_scripts", "twofifteen_styles");

//============================================================
//Send email to admin to contact about the Unit
//============================================================
function twofifteen_open_gallery()
{ 
   
    // process form data
    $u = $_POST['u']; 
    $totalItem = $_POST['g'];

    if( isset($u) && $u != "")
    {
        if( $totalItem > 0 )
        {
            ?>
            <div id="aniimated-thumbnials" class="grid_4">
                <?php
                    for($i = 1; $i <= $totalItem; $i++)
                    {
                        $item = urldecode($_POST['item_'.$i]);
                        $item = explode("||", $item);
                        $preview = trim($item[0]);
                        $fullUrl = trim($item[1]);
                        ?>
                                    
                            <a href="<?php echo $fullUrl; ?>">
                                <img data-src="<?php echo $preview; ?>" class="img-fluid lazy">
                            </a>       
                        <?php
                    }
                ?>
            </div>
            <?php
                        
        } 
        else
        {
            ?>
                <h1>Gallery is not available</h1>
            <?php
        }   
    }

    //wp_send_json($return);
    
    wp_die();
}
add_action( 'wp_ajax_nopriv_twofifteen_open_gallery', 'twofifteen_open_gallery' );
add_action( 'wp_ajax_twofifteen_open_gallery', 'twofifteen_open_gallery' );



//============================================================
//Send email to admin to contact about the Unit
//============================================================
function twofifteen_contact_unit()
{
    if ( ! isset( $_POST['nonce_unit'] )  || ! wp_verify_nonce( $_POST['nonce_unit'], 'nonce_action_send_unit' ) ) 
    {
        print 'Sorry, your nonce did not verify.';
        $return = array(
            'message'  => 'Sorry, nonce not verified.',
            'status'   => 0
        );
        wp_send_json($return);
    } 
    else 
    {
        // process form data
        $message = sanitize_text_field( $_POST['message'] );
        $unit = sanitize_text_field( $_POST['unit'] );
        $name = sanitize_text_field( $_POST['name'] );
        $page_id = sanitize_text_field( $_POST['page_id'] );
        $email = sanitize_email( $_POST['email'] );
        $phone_number = sanitize_text_field( $_POST['phone_number'] );
        $destination = sanitize_text_field( base64_decode($_POST['destination']) );

        $arrTo = array();
        if(  $destination != "")
        {
            $inputList = explode(",",  $destination);
            foreach($inputList as $item)
            {
                if( $item != "")
                {
                    $arrTo[] = $item;
                }
            }
        }

        //$parentpost_id = wp_get_post_parent_id( $page_id );
        $data = get_field("availability_units", $page_id);
        $setSubject =  trim($data['subject']);//."--->";
        if( $setSubject == "" )
        {
            $setSubject = "Contact from availability page - Unit ";
        }

        $subject = $setSubject." ".$unit."";
        $body = "<p><strong>Name: </strong>".$name."</p>";
        $body .= "<p><strong>Email: </strong>".$email."</p>";
        $body .= "<p><strong>Phone Number: </strong>".$phone_number."</p>";
        $body .= "<p><strong>Message: </strong>".$message."</p>";
        $arrTo[] = trim($destination);
        $to = $arrTo;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $to, $subject, $body, $headers );
        
        $return = array(
            'message'  => 'Thank you, the message was sent',
            'status'   => 1
        );
        wp_send_json($return);
    }
    wp_die();
}
add_action( 'wp_ajax_nopriv_twofifteen_contact_unit', 'twofifteen_contact_unit' );
add_action( 'wp_ajax_twofifteen_contact_unit', 'twofifteen_contact_unit' );

//============================================================
//Get all available time
//============================================================
function twofifteen_getAvailableTime()
{
    if ( isset( $_POST['date'] ) && $_POST['date'] != "" && isset($_POST["unit"]) && $_POST["unit"] != ""  ) 
    {
        // process form data
        $unit = sanitize_text_field( $_POST['unit'] );
        $date = sanitize_text_field( $_POST['date'] );
        $date = date("Y-m-d", strtotime($date));

        $arrData = array(
            "building"=>"2Fifteen",
            "unit" => $unit,
            "date" => $date
        );
        $res = setCurlPhp("GetAvailableTime", $arrData);
        $return = array(
            'data'  => $res,
            'status'   => 1
        );
        wp_send_json($return);
    }
    wp_die();
}
add_action( 'wp_ajax_nopriv_twofifteen_getAvailableTime', 'twofifteen_getAvailableTime' );
add_action( 'wp_ajax_twofifteen_getAvailableTime', 'twofifteen_getAvailableTime' );


//============================================================
//Send booking 
//============================================================
function twofifteen_send_booking()
{
    if ( 
        isset( $_POST['full_name'] ) && $_POST['full_name'] != "" 
        //&& isset($_POST["last_name"]) && $_POST["last_name"] != "" 
        && isset($_POST["email"]) && $_POST["email"] != ""
        && isset($_POST["phone"]) && $_POST["phone"] != ""
        && isset($_POST["unit"]) && $_POST["unit"] != ""
        && isset($_POST["preferred_suite_size"]) && $_POST["preferred_suite_size"] != "" //from
        && isset($_POST["slottime"]) && $_POST["slottime"] != ""
     ) 
    {
        // process form data
        $desired_move_in_Date = sanitize_text_field( $_POST['desired_move_in_Date'] ); //to
        $are_you_a_realtor = sanitize_text_field( $_POST['are_you_a_realto'] );
        $are_you_working_with_a_Realtor = sanitize_text_field( $_POST['are_you_working_with_a_Realtor'] );

        $date_preferred = sanitize_text_field( $_POST['preferred_suite_size'] );
        $date_preferred = date("Y-m-d", strtotime($date_preferred));

        $date_desired = sanitize_text_field( $_POST['desired_move_in_Date'] );
        $date_desired = date("Y-m-d", strtotime($date_desired));




        $arrData = array(
            "building"=>"2Fifteen",
            "unit" => $_POST["unit"],
            "date" => $date_preferred,
            "time" => $_POST["slottime"],
            "media" => "2Fifteen Website",
            "prospect" => $_POST['full_name'],
            "email" => $_POST["email"],
            "phone1" =>$_POST["phone"]
        );

        $arrExtra = array(
            "full_name" => $_POST['full_name'],
            "expected_move_in" => $date_desired,
            "are_you_a_realtor" => $are_you_a_realtor,
            "are_you_working_with_a_realtor" => $are_you_working_with_a_Realtor,
        );

        $res = setCurlPhp("BookAppointment", $arrData, $arrExtra);
        $return = array(
            'data'  => $res,
            'status'   => 1
        );
        wp_send_json($return);
    }
    wp_die();
}
add_action( 'wp_ajax_nopriv_twofifteen_send_booking', 'twofifteen_send_booking' );
add_action( 'wp_ajax_twofifteen_send_booking', 'twofifteen_send_booking' );



function setCurlPhp($action, $arrData, $arrExtra = false)
{
    $curl = curl_init();
    $url = "https://prestonliving.leadmanaging.com/application/api/index.php";
    $data = array(
      "key"=> "prestonliving#leadmanaging#api#2021",
      "action"=> $action,
      "data"=> $arrData,
    );

    //$json = json_encode($data);
    if( $action == "BookAppointment" )
    {
        $data["ques_ans"] = $arrExtra;
    }

    $json = json_encode($data);

    //var_dump($json);
    //exit();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
      ),
    ));
    $response = curl_exec($curl);
    
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        //var_dump($response);
        $data = (array) (json_decode($response));
        //$units = ($data->Result->AvailableUnits);
    }

    return $data;
}



function getTokenBuildingStack()
{
    $curl = curl_init();
    $url = "https://api.buildingstack.com/api/Auth/Login";
    $data = array(
      "username"=> "nicholas@thecommunity.ca",
      "password"=> "Buildingstack215",
      "clientId"=> "widget",
      "clientSecret"=> "domumwidget",
    );

    $json = json_encode($data);

    //var_dump($json);
    //exit();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
      ),
    ));
    $response = curl_exec($curl);
    
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        //var_dump($response);
        $data = (array) (json_decode($response));
        //$units = ($data->Result->AvailableUnits);
    }

    return $data;
}

function getDataBuildingStack($token)
{
    $curl = curl_init();
    $url = "https://api.buildingstack.com/api/Widget/CompanyWebsiteData";

    $authorization = "Authorization: Bearer ".$token;
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      //CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
         $authorization
      ),
    ));
    $response = curl_exec($curl);
    
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        //var_dump($response);
        $data = (array) (json_decode($response));
        //$units = ($data->Result->AvailableUnits);
    }

    return $data;
}
/*
function register_my_session(){
    if( ! session_id() ) {
        
        ini_set('session.cookie_secure', "1"); 
        ini_set('session.cookie_httponly', "1"); 
        ini_set('session.cookie_samesite','None'); 
        
        session_start();
    }
}

add_action('init', 'register_my_session');
*/

/*Menus*/
function twofifteen_menus(){
    register_nav_menus( array(
        'header-menu' => 'Header Menu',
    ));
}
add_action("init","twofifteen_menus" );


//add_action('acf/init', 'my_acf_op_init');
if( function_exists('acf_add_options_page') ) {
    
    $parent =  acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    // Add sub page.
    $child = acf_add_options_page(array(
        'page_title'  => __('Google Map'),
        'menu_title'  => __('Google Map'),
        'parent_slug' => $parent['menu_slug'],
    ));

    $child = acf_add_options_page(array(
        'page_title'  => __('Google Analytics'),
        'menu_title'  => __('Google Analytics'),
        'parent_slug' => $parent['menu_slug'],
    ));

    $child = acf_add_options_page(array(
        'page_title'  => __('Google Tag Manager'),
        'menu_title'  => __('Google Tag Manager'),
        'parent_slug' => $parent['menu_slug'],
    ));
}





