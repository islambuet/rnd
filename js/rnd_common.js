$(document).ready(function()
{
    //load dashboard first time
    load_main_page();
    // binds form submission and fields to the validation engine

    //binds form submission with ajax
    $(document).on("submit", "form", function(event)
    {
        var url=$(this).attr("action");
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "JSON",
            data:$(this).serialize(),
            success: function (data, status)
            {
                if(data.status)
                {
                    //execute for success
                    load_template(data.content);
                    $(".form_valid").validationEngine();
                }
                else
                {
                    //also execute for error
                    load_template(data.content);
                }
            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });
        return false;

    });
    $(document).on("click", ".main-menu-container .menu-item", function(event)
    {
        $.ajax({
            url: base_url+"dashboard/get_sub_menu/",
            type: 'POST',
            dataType: "JSON",
            data:{menu_id:$(this).attr("data-menu-id")},
            success: function (data, status)
            {
                if(data.status)
                {
                    //execute for success
                    load_template(data.content);
                    $(".form_valid").validationEngine();
                }
                else
                {
                    //also execute for error
                    load_template(data.content);
                }
            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });
        return false;

    });
    $(document).on("click", ".sub-menu-container .menu-item", function(event)
    {
        $.ajax({
            url: $(this).attr("data-menu-link"),
            type: 'POST',
            dataType: "JSON",
            success: function (data, status)
            {
                if(data.status)
                {
                    //execute for success
                    load_template(data.content);
                    $(".form_valid").validationEngine();
                }
                else
                {
                    //also execute for error
                    load_template(data.content);
                }
            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });


    });
    $(document).on("click", "a", function(event)
    {
        event.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            type: 'POST',
            dataType: "JSON",
            success: function (data, status)
            {
                if(data.status)
                {
                    //execute for success
                    load_template(data.content);
                    $(".form_valid").validationEngine();
                }
                else
                {
                    //also execute for error
                    load_template(data.content);
                }
            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });
    $(document).on("click", "#button_save", function(event)
    {
        $("#save_form").submit();

    });

});
function load_main_page()
{
    $.ajax({
        url: base_url + 'home/login',
        type: 'POST',
        dataType: "JSON",
        success: function (data, status)
        {
            if(data.status)
            {
                //execute for success
                load_template(data.content);
            }
            else
            {
                //also execute for error
                load_template(data.content);
            }
        },
        error: function (xhr, desc, err)
        {
            console.log(error);

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

