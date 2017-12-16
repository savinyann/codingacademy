$(function()
{
    $("#button").click(first_list_fist_elem_destructor)

    function first_list_fist_elem_destructor()
    {
        $("ul:first > li:first").remove()
    }
})

