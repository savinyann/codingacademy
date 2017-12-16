$(document).ready(function()
{
    $("button").after("<ul></ul>")
    $("button:first").click(showdata);

    $("ul").on("click","button",function()
        {
            var li = $(this).parent();
            var input = $(this).parent().children("input");
            li.attr("tag", li.attr("tag")+" "+input.val());
        });

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
            $("ul").append("<li class='note' id='note_add_tag' tag='"+$("input[name='tag_note']").val()+"'>"+note+"<input type='text' name='tag_note_add'><button>Add Tag</button></li>")
        }

        if(filter.test($("input[name='email']").val()))
        {
            email = $("input[name='email']").val();
            $("ul").append("<li class='email' tag='"+$("input[name='tag_email']").val()+"'>"+email+"<input type='text' name='tag_email_add'><button id='email'>Add Tag</button></li>")
        }

        if($("input[name='todo']").val() != "")
        {
            todo = $("input[name='todo']").val()
            $("ul").append("<li class='todo' tag='"+$("input[name='tag_todo']").val()+"'>"+todo+"<input type='text' name='tag_todo_add'><button id='todo'>Add Tag</button></li>")
        }
    }
});