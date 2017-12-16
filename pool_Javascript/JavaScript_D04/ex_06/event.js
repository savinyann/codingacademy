$(function()
{
    $("button:first").click(p_destructor)

    function p_destructor()
    {
        $("p").remove()
    }
})