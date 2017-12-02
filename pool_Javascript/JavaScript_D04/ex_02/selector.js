$(function()
{
    $("#button").click(test_destructor)

    function test_destructor()
    {
        $("#test").remove()
    }
})

