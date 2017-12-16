$(function()
{
    $("#button").click(a_blank_destructor)

    function a_blank_destructor()
    {
        $("a:not([target='_blank'])").fadeTo(0,0.5)
    }
})

