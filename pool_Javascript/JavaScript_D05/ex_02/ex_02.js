$(document).ready(function()
{
    $("button").after("<ul></ul>")
    $("button").click(showdata);



    function showdata()
    {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if($("input[name='note']").val() != "")
        {
            var note = $("input[name='note']").val()
            $("ul").append("<li class='note'>"+note+"</li>")
        }

        if(filter.test($("input[name='email']").val()))
        {
            var email = $("input[name='email']").val();
            $("ul").append("<li class='email'>"+email+"</li>")
        }

        if($("input[name='todo']").val() != "")
        {
            var todo = $("input[name='todo']").val()
            $("ul").append("<li class='todo'>"+todo+"</li>")
        }
    }
});