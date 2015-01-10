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
        setTimeout(function()
        {
            $("#loading").hide();
            if(xhr.responseJSON.message)
            {
                animate_message(xhr.responseJSON.message);
            }
        }, 1000);
    });
    $(document).ajaxError(function(event,xhr,options)
    {

        setTimeout(function()
        {
            $("#loading").hide();

            animate_message("Server Error");

        }, 1000);

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

    $(document).on("change", "#variety_crop_select", function(event)
    {
        var crop_id = $("#variety_crop_select").val();
//        var product_type_id = '<?php echo $varietyInfo['product_type_id'];?>';
        $.ajax({
            url: base_url+"rnd_common/dropDown_crop_type_by_name/",
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

});

//////// Variety END