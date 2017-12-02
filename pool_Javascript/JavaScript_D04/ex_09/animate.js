$(document).ready(function()
{
    $("#platypus").click(move_me)

function move_me()
{
    $("#platypus").animate({left: "150px",top:"200px"});
    $(this).css('background-color', 'green');
}
});