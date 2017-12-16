$(document).ready(function()
{
    $("button").after("<ul></ul>")
    $("button:first").click(showdata);


    $("#search").keyup(function()
    {
        var count = 0;
        var search = $(this).val().toLowerCase().split(" ")
        $("li").each(function()
        {
            var list = $(this)
            var match = true
            search.forEach(function(element)
            {
                if(list.text().toLowerCase().search(element) == -1 && !list.hasClass(element))
                {
                    match = false
                }
            })
            if(match)
            {
                $(this).show()
            }
            else
            {
                $(this).hide()
            }
        })
    })


    function showdata()
    {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if($("input[name='note']").val() != "")
        {
            note = $("input[name='note']").val()
            $("ul").append("<li class='note'>"+note+"</li>")
        }

        if(filter.test($("input[name='email']").val()))
        {
            email = $("input[name='email']").val();
            $("ul").append("<li class='email'>"+email+"</li>")
        }

        if($("input[name='todo']").val() != "")
        {
            todo = $("input[name='todo']").val()
            $("ul").append("<li class='todo'>"+todo+"</li>")
        }
    }
});