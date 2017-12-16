$(document).ready(function()
{
    $("button").click(append_sentences)

	function append_sentences()
	{
		$("img:first").before("<p>Wow, I precede the image!</p>")
		$("img:first").after("<p>Hey, I come in last. // That's what she said last night :p</p>")
	}
});