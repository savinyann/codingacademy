$(document).ready(function()
{
    menu_state=true;
    $("button").click(menu_appear_disappear)

function menu_appear_disappear()
{
    $("#menu").toggle();
}
});