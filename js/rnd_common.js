$(document).ready(function()
{
    load_main_page();

});
function load_main_page()
{
    $.ajax({
        url: base_url + 'home/load_main_page',
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
        console.log(content[i].id);
        console.log(content[i].html);

    }

}

