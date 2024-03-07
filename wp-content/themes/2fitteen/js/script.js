jQuery(document).ready(function($){


    //==============================================================
    //Menu
    //==============================================================
    function myFunction(x) {
        if (x.matches) { // If media query matches
            $("header #icon-menu-open, .holder-icon-main-menu").show();
            $("header #icon-menu-close").hide();
            $("#nav-parent").hide().addClass("mobile-menu");
            $(".show-mobile-menu").show();
            $(".content_top_bar").hide();
        } else {
            $("header #icon-menu-open, header #icon-menu-close, .holder-icon-main-menu").hide();
            $("#nav-parent").show().removeClass("mobile-menu");
            $(".show-mobile-menu").hide();
            $(".content_top_bar").show();
        }
    }
    
    var x = window.matchMedia("(max-width: 990px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes


    $('.icon-action-menu').on('click', function(e)
    {
        
        var subMenu = $("#nav-parent");
        if(subMenu.is(':visible'))
        {
            subMenu.slideUp();
            $('.icon-action-menu').hide();
            $("header #icon-menu-open").show();
        } else {
            subMenu.slideDown();
            $('.icon-action-menu').hide();
            $("header #icon-menu-close").show();
        }
        
    });

    $('#table_availability').DataTable({
        searching: false, paging: false, info: false,
        "order": [[ 3, "asc" ]],
        "columnDefs": [
            { "orderable": false, "targets": 5 },
            { "orderable": false, "targets": 6 },
            { "orderable": false, "targets": 7 }
        ]
    });

    //=======================================
    //Add stick top bar
    //=======================================
    $(window).bind('scroll', function() {
        checkScroll();
    });

    checkScroll();
    function checkScroll(){
        var navHeight = 100;
        if ($(window).scrollTop() > navHeight) {
            $('.float-panel').addClass('fixed');
            
        }
        else {
            $('.float-panel').removeClass('fixed');
        }
    }

    //Sliders
    if( $(".slider1").length > 0 ){
      window.onload = function () {
        $('.slider1').jdSlider({
            wrap: '.slide-inner',
            isLoop: true,
            isAuto: true,
            
          
        });
      }
    }

    /*
    if( $('#aniimated-thumbnials').length == 1 )
    {
      $('#aniimated-thumbnials').lightGallery({
        thumbnail:true
      }); 
    }
    */

    //Gallery modal
    
    $("body").on("click", ".open-gallery", function(event){
        event.preventDefault();
        let url = $(this).attr("href");
        openLoading();
        $("#holderPopupGallery").hide();
        $.ajax({
            type: "post",
            url: ajax_var.url,
            //dataType: 'JSON',
            data: "action=" + ajax_var.action_open_gallery + "&" + url,
            success: function(result){

                $("#renderGallery").html(result);
                $("#holderPopupGallery").show();
                closeLoading();

                
                $('.lazy').lazy({
                    bind: "event",
                    delay: 0
                });
                if( $('#aniimated-thumbnials').length == 1 )
                {
                    $('#aniimated-thumbnials').lightGallery({
                        thumbnail:true
                    }); 
                }
            },
            error: function(){
                //closeLoading();

                closeLoading();
                $("#holderPopupGallery").show();
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error',
                    icon: 'error',
                    confirmButtonText: 'Close'
                })
            }
        });

        
    });

    $("body").on("click", "#closePopupGallery", function(event){
        event.preventDefault();
        $("#holderPopupGallery").hide();
    });

    

    /* Modal Availability page */
    $("body").on("click","#closePopupAvailability", function(event){
        event.preventDefault();
        $("#holderPopupAvailability").hide();
    });

    $("body").on("click",".modal-contact-availability", function(event){
        event.preventDefault();
        $("#holderPopupAvailability").show();
        let unit = $(this).attr("data-unit");
        let destination = $(this).attr("data-destination");
        $(".unitSelected").html(unit);
        $("#inputUnit").val(unit);
        $("#destination").val(destination);
    });

    function openLoading(){
        $("#overlayLoading").show();
    }
    function closeLoading(){
        $("#overlayLoading").hide();
    }
    $("form#form_unit").on("submit", function(event){
        event.preventDefault();
        let name = $.trim($("#name").val());
        let email = $.trim($("#email").val());
        let phone_number = $.trim($("#phone_number").val());
        let message = $.trim($("#textMessageUnit").val());
        let unit = $.trim($("#inputUnit").val());
        let nonce_unit = $("#nonce_unit").val();
        let destination = $("#destination").val();
        let page_id = $("#page_id").val();

        openLoading();
        $("#holderPopupAvailability").hide();
        $.ajax({
            type: "post",
            url: ajax_var.url,
            dataType: 'JSON',
            data: "action=" + ajax_var.action_contact_unit + "&nonce_unit=" + nonce_unit+"&message="+message+"&unit="+unit+"&destination="+destination+"&name="+name+"&email="+email+"&phone_number="+phone_number+"&page_id="+page_id,
            success: function(result){

                if(result.status == 1)
                {  
                    closeLoading();
                    $("#holderPopupAvailability").hide();
                    $("form#form_unit")[0].reset();
                    Swal.fire({
                        title: 'success!',
                        text: result.message,
                        icon: 'success',
                        confirmButtonText: 'Close'
                    })
                }
                else
                {
                    closeLoading();
                    $("#holderPopupAvailability").show();
                    Swal.fire({
                        title: 'Error!',
                        text: result.message,
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                }
            },
            error: function(){
                //closeLoading();

                closeLoading();
                $("#holderPopupAvailability").show();
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error',
                    icon: 'error',
                    confirmButtonText: 'Close'
                })
            }
        });
    });


    //==========================================
    //Modal contact Page
    //==========================================
    $("body").on("click","#closePopupContactPage", function(event){
        event.preventDefault();
        $("#holderPopupContactPage").hide();
    });

    $("body").on("click",".modal-contactpage", function(event){
        event.preventDefault();
        $("#holderPopupContactPage").show();
    });



    //==========================================
    //Booking Form
    //==========================================
    if(  $("#form_booking").length > 0 )
    {

        //$("#phone_number").inputmask("999-999-9999");  //static mask


        var dateToday = new Date();
        var dateFormat = "mm/dd/yy";

        let avaiableFrom = false;
        if( ajax_var.max_date )
        {

            //Check if the min date is > then current date
            //Become the / to -
            let getMinDate = ajax_var.max_date;
            //alert(setMinDate);
            getMinDate = getMinDate.split("/");//replace("/", "-");

            let newMinDate = getMinDate[0]+"-"+getMinDate[1]+"-"+getMinDate[2];

            let todayDate = new Date().toISOString().slice(0, 10);
            if( todayDate >= newMinDate)
            {
                //alert("Hoy es mayor")
                avaiableFrom = false;
            }
            else
            {
                //alert("Hoy es menor")
                avaiableFrom = true;
            }
        }

        if( avaiableFrom )
        {
            //alert(ajax_var.max_date);

           
           // alert("if");
           
            from = $( "#from" )
                .datepicker({
                    //defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    minDate: dateToday,
                    //buttonImage: "images/calendar.gif",

                })
                .on( "change", function(selected,evnt) {
                    to.datepicker( "option", "minDate", new Date(ajax_var.max_date) );
                    
                    //to.datepicker( "option", "minDate", getDate( this ) );
                    updateAb( formatDate(ajax_var.max_date) );
                }),
                
                to = $( "#to" ).datepicker({
                    changeMonth: true,
                    numberOfMonths: 1,
                    //minDate: new Date(ajax_var.max_date),
                })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });

        }else{
            //alert("No if");
            from = $( "#from" )
                .datepicker({
                    //defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    minDate: dateToday,
                    //buttonImage: "images/calendar.gif",

                })
                .on( "change", function(selected,evnt) {
                    to.datepicker( "option", "minDate", getDate( this ) );
                        updateAb( formatDate(getDate( this )) );
                }),
                to = $( "#to" ).datepicker({
                    //defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    //maxDate: new Date('2022/07/31'),
                })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });

        }
        
    
        function getDate( element ) {
            var date;
            try {
            date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
            date = null;
            }

            return date;
        }


        //Change date GMT to YYYY-MM-DD
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
        
            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
        
            return [year, month, day].join('-');
        }

        function updateAb(value){   
                //$("#to").attr("disabled", false);
                var unit = $("#book_unit").val(); 
                openLoading();
                $("#book_slots").empty();
                $.ajax({
                    type: "post",
                    url: ajax_var.url,
                    dataType: 'JSON',
                    data: "action=" + ajax_var.action_getAvailableTime + "&date=" + value + "&unit=" + unit,
                    success: function(result){
        
                        if(result.status == 1)
                        {  

                            if(result.data.Result.ErrorID == 0)
                            {
                                var availableTime = result.data.Result.AvailableTime;
                                if( availableTime.length > 0 )
                                {
                    
                                    
                                    availableTime.forEach(element => {
                                        console.log(element);
                                        $("#book_slots").append( "<span class='slotTime' data-slot='"+element+"'>"+element+"</span>" );
                                    });
                                    $("#book_slots").append("<br><br>");
                                   
                                }
                                else
                                {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: "There are no avaiable slots",
                                        icon: 'error',
                                        confirmButtonText: 'Close'
                                    });
                                    $("#sendMessageUnit").attr("disabled",true);
                                    //$("#sendMessageUnit").hide();
                                }
                            }else{
                                Swal.fire({
                                    title: 'Error!',
                                    text: result.data.Result.ErrorMsg,
                                    icon: 'error',
                                    confirmButtonText: 'Close'
                                })
                            }
                            closeLoading();
                            console.log(result.data)
                        }
                        else
                        {
                            closeLoading();
                            Swal.fire({
                                title: 'Error!',
                                text: result.message,
                                icon: 'error',
                                confirmButtonText: 'Close'
                            })
                        }
                    },
                    error: function(){
                        closeLoading();
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an error',
                            icon: 'error',
                            confirmButtonText: 'Close'
                        })
                    }
                }); 
        }


        $("body").on("click",".slotTime", function(){
            $(".slotTime").removeClass("active");
            $(this).addClass("active");
            $("#to").attr("disabled", false);
            $("#sendMessageUnit").attr("disabled",false);
            //var btn = $(this).val();
        });

        $("body").on("change","#book_unit", function(){
            $("#from").attr("disabled", false);
            
            $("#from, #to").val("");
            $("#book_slots").empty();
            $("#sendMessageUnit").attr("disabled",true);
        });


        $("#phone_part_1").on("keypress",function(){
            if( $(this).val().length == 3 )
            {
                $("#phone_part_2").focus();
            }
        });

        $("#phone_part_2").on("keypress",function(){
            if( $(this).val().length == 3 )
            {
                $("#phone_part_3").focus();
            }
            
        });

    }


    //==========================================
    //Modal Booking Form
    //==========================================
    $("body").on("click",".btn-open-booking", function(event){
        event.preventDefault();
        $("#holderPopupBooking").show();
    });

    $("body").on("click","#closePopupBooking", function(event){
        event.preventDefault();
        $("#holderPopupBooking").hide();
        $("form#form_booking")[0].reset();
        $("#book_slots").empty();
        $("#from, #to").attr("disabled", true);
    });


    $('.cboxs').click(function() {
        //$('.cboxs').not(this).prop('cboxs', false);
        $('input:checkbox.cboxs').not(this).prop('checked', false);
        
    });

    $("form#form_booking").submit(function(event){
        event.preventDefault();

        var full_name = $("#booking_full_name").val();
        //var last_name = $("#booking_last_name").val();
        var email = $("#booking_email").val();
        var phone = $("#phone_part_1").val()+" "+$("#phone_part_2").val()+" "+$("#phone_part_3").val();
        var unit = $("#book_unit").val();
        var preferred_suite_size = $("#from").val();
        var desired_move_in_Date = $("#to").val();

        var slottime = $(".slotTime.active").attr("data-slot");

        var are_you_a_realto = "No";
        if( $('#cbox1').prop('checked') ) {
            are_you_a_realto = "Yes";
        }

        var are_you_working_with_a_Realtor = "No"
        if( $('#cbox2').prop('checked') ) {
            are_you_working_with_a_Realtor = "Yes";
        }

        //Send the form
        openLoading();
        $("#holderPopupBooking").hide();
        $.ajax({
            type: "post",
            url: ajax_var.url,
            dataType: 'JSON',
            data: "action=" + ajax_var.action_send_booking + 
                    "&full_name="+full_name+
                    //"&last_name="+last_name+
                    "&email="+email+
                    "&phone="+phone+
                    "&unit="+unit+
                    "&preferred_suite_size="+preferred_suite_size+
                    "&slottime="+slottime+
                    "&desired_move_in_Date="+desired_move_in_Date+
                    "&are_you_a_realto="+are_you_a_realto+
                    "&are_you_working_with_a_Realtor="+are_you_working_with_a_Realtor,
            success: function(result){
        
                if(result.status == 1)
                {  
                    var message = result.data.Result.ErrorMsg;
                    if(result.data.Result.ErrorID == 0)
                    {
                        
                        $("form#form_booking")[0].reset();
                        $("#book_slots").empty();
                        Swal.fire({
                            title: 'success!',
                            text: message,
                            icon: 'success',
                            confirmButtonText: 'Close'
                        })

                    }else{
                        $("#holderPopupBooking").show();
                        Swal.fire({
                            title: 'Error!',
                            text: message,
                            icon: 'error',
                            confirmButtonText: 'Close'
                        })
                    }
                    closeLoading();
                    //console.log(result.data)
                }
                else
                {
                    closeLoading();
                    $("#holderPopupBooking").show();
                    Swal.fire({
                        title: 'Error!',
                        text: result.message,
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                }
            },
            error: function(){
                closeLoading();
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error',
                    icon: 'error',
                    confirmButtonText: 'Close'
                })
            }
        });
    });

    $('.phone-css-fields').keypress(function (e) {    
    
        var charCode = (e.which) ? e.which : event.keyCode    

        if (String.fromCharCode(charCode).match(/[^0-9]/g))    

            return false;                        

    }); 
    
})