$(document).ready(function()
{
    $(document).ajaxStart(function()
    {
        $("#loading").show();
    });
    $(document).ajaxSuccess(function(event,xhr,options)
    {
        if(xhr.responseJSON)
        {
            if(xhr.responseJSON.content)
            {
                load_template(xhr.responseJSON.content);
            }

        }


    });
    $(document).ajaxComplete(function(event,xhr,options)
    {
        if(xhr.responseJSON.page_url)
        {
            //window.history.pushState(null, "Search Results",xhr.responseJSON.page_url);
            window.history.replaceState(null, "Search Results",xhr.responseJSON.page_url);
        }

        //$("#loading").hide();
        $("#loading").hide();
        if(xhr.responseJSON.message)
        {
            animate_message(xhr.responseJSON.message);
        }
    });
    $(document).ajaxError(function(event,xhr,options)
    {

        $("#loading").hide();

        animate_message("Server Error");

    });


    //load dashboard first time
    load_main_page();
    // binds form submission and fields to the validation engine

    //binds form submission with ajax
    $(document).on("submit", "form", function(event)
    {
        event.preventDefault();

        var url=$(this).attr("action");
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "JSON",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });
        return false;

    });
    //action for menu-item click
    $(document).on("click", ".main-menu-container .menu-item", function(event)
    {
        $.ajax({
            url: base_url+"dashboard/get_sub_menu/",
            type: 'POST',
            dataType: "JSON",
            data:{menu_id:$(this).attr("data-menu-id")},
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });
        return false;

    });
    //action for submenu click
    $(document).on("click", ".sub-menu-container .menu-item", function(event)
    {
        $.ajax({
            url: $(this).attr("data-menu-link"),
            type: 'POST',
            dataType: "JSON",
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });


    });
    //bind any anchor tag to ajax request
    $(document).on("click", "a", function(event)
    {
        if($(this).hasClass('external'))
        {
            return true;
        }
        event.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            type: 'POST',
            dataType: "JSON",
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });
    //bind save button to submit the form
    $(document).on("click", "#button_save", function(event)
    {
        $("#save_form").submit();

    });

});
function load_main_page()
{
    $.ajax({
        url: location,
        type: 'POST',
        dataType: "JSON",
        success: function (data, status)
        {
            $.ajax({
                url: base_url+"home/sidebar/",
                type: 'POST',
                dataType: "JSON",
                success: function (data, status)
                {

                },
                error: function (xhr, desc, err)
                {
                    console.log("error");

                }
            });

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });
}
function load_template(content)
{
    for(i=0;i<content.length;i++)
    {
        $(content[i].id).html(content[i].html);
        //console.log(content[i].id);
        //console.log(content[i].html);
    }
}
function animate_message(message)
{
    $("#message").hide();
    $("#message").html(message);
    $('#message').slideToggle("slow").delay(3000).slideToggle("slow");
    //$('#message').toggle("slide",{direction:"right"},500);

}

////////// Variety START

$(document).ready(function()
{

    $(document).on("change", "#variety_type_competitor", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#competitor_div").removeClass('hiddenCompany');
        }
    });

    $(document).on("change", "#variety_type_arm", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#competitor_div").addClass('hiddenCompany');
        }

    });

    $(document).on("change", "#variety_type_principal", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#competitor_div").addClass('hiddenCompany');
        }

    });

    $(document).on("change", "#variety_type_principal", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#principal_div").removeClass('hiddenPrincipal');
        }
    });

    $(document).on("change", "#variety_type_arm", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#principal_div").addClass('hiddenPrincipal');
        }
    });

    $(document).on("change", "#variety_type_competitor", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#principal_div").addClass('hiddenPrincipal');
        }
    });

});

//////// Variety END

//////// Create Crop START

$(document).ready(function()
{
    $(document).on("change", "#cc_crop_name", function(event)
    {
        var crop_name = $("#cc_crop_name").val();
        var crop_id = $("#crop_id").val();
        $.ajax({
            url: base_url+"create_crop/check_existing_crop_name/",
            type: 'POST',
            dataType: "JSON",
            data:{crop_name:crop_name,crop_id:crop_id},
            success: function (data, status, message)
            {
                //$("#cc_crop_name").val('');
            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });

    $(document).on("change", "#cc_crop_code", function(event)
    {
        var crop_code = $("#cc_crop_code").val();
        var crop_id = $("#crop_id").val();
        $.ajax({
            url: base_url+"create_crop/check_existing_crop_code/",
            type: 'POST',
            dataType: "JSON",
            data:{crop_code:crop_code,crop_id:crop_id},
            success: function (data, status, message)
            {
                //$("#cc_crop_code").val('');
            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });

});

//////// Create Crop END

////////////////////////////////////////////// Variety START ///////////////////////////////////////

$(document).on("change", "#variety_crop_select", function(event)
{
    var variety_crop_id = $("#variety_crop_select").val();
    $.ajax({
        url: base_url+"rnd_common/variety_dropDown_crop_type_by_name/",
        type: 'POST',
        dataType: "JSON",
        data:{variety_crop_id:variety_crop_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

////////////////////////////////////////////// Variety END ///////////////////////////////////////


/////// Create Principal START

$(document).ready(function()
{
    $(document).on("change", "#cp_principal_name", function(event)
    {
        var principal_name = $("#cp_principal_name").val();
        var principal_id = $("#principal_id").val();
        $.ajax({
            url: base_url+"create_principal/check_existing_principal_name/",
            type: 'POST',
            dataType: "JSON",
            data:{principal_name:principal_name,principal_id:principal_id},
            success: function (data, status, message)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });

    $(document).on("change", "#cp_principal_code", function(event)
    {
        var principal_code = $("#cp_principal_code").val();
        var principal_id = $("#principal_id").val();
        $.ajax({
            url: base_url+"create_principal/check_existing_principal_code/",
            type: 'POST',
            dataType: "JSON",
            data:{principal_code:principal_code,principal_id:principal_id},
            success: function (data, status, message)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });

});

//////// Create Principal END


//////// Create Fertilizer START

$(document).on("blur", "#fertilizer_name", function(event)
{
    var fertilizer_name = $("#fertilizer_name").val();
    var fertilizer_id = $("#fertilizer_id").val();

    $.ajax({
        url: base_url+"create_fertilizer/check_existing_fertilizer_name/",
        type: 'POST',
        dataType: "JSON",
        data:{fertilizer_name:fertilizer_name, fertilizer_id:fertilizer_id},
        success: function (data, status, message)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

//////// Create Fertilizer END

/////// Create Pesticide START

$(document).on("blur", "#pesticide_name", function(event)
{
    var pesticide_name = $("#pesticide_name").val();
    var pesticide_id = $("#pesticide_id").val();

    $.ajax({
        url: base_url+"create_pesticide/check_existing_pesticide_name/",
        type: 'POST',
        dataType: "JSON",
        data:{pesticide_name:pesticide_name, pesticide_id:pesticide_id},
        success: function (data, status, message)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

//////// Create Pesticide END


/////// General Sample Delivery START

$(document).on("change", "#sample_season_id", function(event)
{
    var season_id = $("#sample_season_id").val();

    $.ajax({
        url: base_url+"rnd_common/load_rnd_codes_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{season_id:season_id},
        success: function (data, status)
        {
            var rnd_code_view = '';
            for(var i=0;i<data.length;i++)
            {
                rnd_code_view += "<tr><td><input type='hidden' id='row_id[]' name='row_id[]' value='' /> \n\
                    <input type='checkbox' id='rnd_code[]' name='rnd_code[]' value='"+data[i]['id']+"' class='checksingle' checked='' /> "+data[i]['rnd_code']+"</tr></td>";
            }

            $("#div_rnd_code").html(rnd_code_view);

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

//////// General Sample Delivery END


////////////////////////////////////////// Common DropDown START //////////////////////////////////////

$(document).on("change", "#common_season_id", function(event)
{
    var common_season_id = $("#common_season_id").val();
//    var crop_selected = '<?php echo $pictureInfo['crop_id'];?>';
    $.ajax({
        url: base_url+"rnd_common/common_dropDown_crop_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{common_season_id:common_season_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});


$(document).on("change", "#common_crop_id", function(event)
{
    var common_crop_id = $("#common_crop_id").val();
//    var product_type_id = '<?php echo $pictureInfo['type_id'];?>';
    $.ajax({
        url: base_url+"rnd_common/common_dropDown_crop_type_by_name/",
        type: 'POST',
        dataType: "JSON",
        data:{common_crop_id:common_crop_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

$(document).on("change", "#common_crop_type", function(event)
{
    var common_crop_id = $("#common_crop_id").val();
    var common_type_id = $("#common_crop_type").val();
    $.ajax({
        url: base_url+"rnd_common/common_dropDown_rnd_code_by_name_type/",
        type: 'POST',
        dataType: "JSON",
        data:{common_crop_id:common_crop_id,common_type_id:common_type_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });

});

//////////////////////////////////////////////// Common DropDown END /////////////////////////////////////////////



///// Sowing Date by Season START /////////

$(document).on("change", "#pr_common_season_id", function(event)
{
    var common_season_id = $("#pr_common_season_id").val();
    $.ajax({
        url: base_url+"rnd_common/common_dropDown_crop_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{common_season_id:common_season_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});


$(document).on("change", "#pr_common_season_id", function(event)
{
    var season_id = $("#pr_common_season_id").val();

    $.ajax({
        url: base_url+"rnd_common/sowing_date_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{season_id:season_id},
        success: function (data, status)
        {
            $("#sowing_date").val(data);
        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

///// Sowing Date by Season END /////////


////////////////////////////////////// File Upload And Instant Display START /////////////////////////

$(document).on("change", ".file_button", function(event)
{
    var image_container = $(this ).siblings( ".file_display_container" );
    if (this.files && this.files[0])
    {
        var reader = new FileReader();

        reader.onload = function ( e )
        {
            image_container.attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

////////////////////////////////////// File Upload And Instant Display END /////////////////////////


////////////////////////////////////////// Procurement Report START //////////////////////////////////////

$(document).on("change", "#procurement_season_id", function(event)
{
    var common_season_id = $("#procurement_season_id").val();
//    var crop_selected = '<?php echo $pictureInfo['crop_id'];?>';
    $.ajax({
        url: base_url+"rnd_common/procurement_dropDown_crop_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{common_season_id:common_season_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

////////////////////////////////////////// Procurement Report START //////////////////////////////////////


/////// Fertilizer Stock Out START /////////

$(document).on("blur", "#feriliser_out_quantity", function(event)
{
    var common_fertilizer_quantity = $("#feriliser_out_quantity").val();
    var common_fertilizer_id = $("#feriliser_in").val();

    $.ajax({
        url: base_url+"rnd_feriliser_stock_out/check_current_stock/",
        type: 'POST',
        dataType: "JSON",
        data:{common_fertilizer_quantity:common_fertilizer_quantity, common_fertilizer_id:common_fertilizer_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});


$(document).on("change", "#fertilizer_season_id", function(event)
{
    var season_id = $("#fertilizer_season_id").val();
    //var crop_selected = '<?php //echo $pesticideInfo['crop_id'];?>';
    $.ajax({
        url: base_url+"rnd_common/fertilizer_crop_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{season_id:season_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

$(document).on("change", "#fertilizer_crop_id", function(event)
{
    var crop_id = $("#fertilizer_crop_id").val();
    //var selected = '<?php //echo $pesticideInfo['pesticide_out_rnd'];?>';
    $.ajax({
        url: base_url+"rnd_common/fertilizer_rnd_code_by_crop/",
        type: 'POST',
        dataType: "JSON",
        data:{crop_id:crop_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });

});


/////// Fertilizer Stock Out END /////////


/////// Pesticide Stock Out START /////////


$(document).on("change", "#pesticide_in", function(event)
{

    var pesticide_id = $("#pesticide_in").val();
    //var crop_selected = '<?php //echo $pesticideInfo['crop_id'];?>';
    $.ajax({
        url: base_url+"rnd_pesticide_stock_out/check_pesticide_stock/",
        type: 'POST',
        dataType: "JSON",
        data:{pesticide_id:pesticide_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

$(document).on("blur", "#pesticide_out_quantity", function(event)
{
    var common_pesticide_quantity = $("#pesticide_out_quantity").val();
    var common_pesticide_id = $("#pesticide_in").val();

    $.ajax({
        url: base_url+"rnd_pesticide_stock_out/check_current_stock/",
        type: 'POST',
        dataType: "JSON",
        data:{common_pesticide_quantity:common_pesticide_quantity, common_pesticide_id:common_pesticide_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});


$(document).on("change", "#pesticide_season_id", function(event)
{

    var season_id = $("#pesticide_season_id").val();
    //var crop_selected = '<?php //echo $pesticideInfo['crop_id'];?>';
    $.ajax({
        url: base_url+"rnd_common/pesticide_crop_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{season_id:season_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

$(document).on("change", "#pesticide_crop_id", function(event)
{
    var crop_id = $("#pesticide_crop_id").val();
    //var selected = '<?php //echo $pesticideInfo['pesticide_out_rnd'];?>';
    $.ajax({
        url: base_url+"rnd_common/pesticide_rnd_code_by_crop_name/",
        type: 'POST',
        dataType: "JSON",
        data:{crop_id:crop_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });

});

/////// Pesticide Stock Out END /////////

//////// Labour Activity Start ////////////


$(document).on("change", "#labour_activity_season_id", function(event)
{

    var season_id = $("#labour_activity_season_id").val();
    //var crop_selected = '<?php //echo $pesticideInfo['crop_id'];?>';
    $.ajax({
        url: base_url+"rnd_common/labour_activity_crop_by_season/",
        type: 'POST',
        dataType: "JSON",
        data:{season_id:season_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");

        }
    });

});

$(document).on("change", "#labour_activity_crop_id", function(event)
{
    var crop_id = $("#labour_activity_crop_id").val();
    //var selected = '<?php //echo $pesticideInfo['pesticide_out_rnd'];?>';
    $.ajax({
        url: base_url+"rnd_common/labour_activity_variety_name_by_crop/",
        type: 'POST',
        dataType: "JSON",
        data:{crop_id:crop_id},
        success: function (data, status)
        {

        },
        error: function (xhr, desc, err)
        {
            console.log("error");
        }
    });

});



//////// Labour Activity End  /////////
