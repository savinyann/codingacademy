var first_box = document.getElementsByTagName("div")[2];
var first_box_clone = first_box.cloneNode(true);
var link = document.getElementsByTagName("a")[0];

link.onclick = cookie_accepted;

if(getCookie("acceptsCookie=true"))
{
	first_box.innerHTML = "";
	new_box();	
}


function new_box()
{
	var second_box = first_box.cloneNode(false);
	var delcookie_button = document.createElement("BUTTON");
	delcookie_button.setAttribute("onClick", "deleteCookie()");
	var delcookie_text = document.createTextNode("Delete the cookie");
	delcookie_button.appendChild(delcookie_text);
	second_box.appendChild(delcookie_button);
	document.getElementsByTagName("footer")[0].appendChild(second_box);
}


function cookie_accepted()
{
	first_box.textContent = "";
	setcookie();
	new_box();
}


function setcookie()
{
	var d = new Date();
	d.setTime(d.getTime() + 86400000);
	d.toUTCString();
	document.cookie = "acceptsCookie=true; expires="+d;
}


function deleteCookie()
{
	var d = new Date();
	d.setTime(d.getTime());
	d.toUTCString();
	document.cookie = "acceptsCookie=true; expires="+d;
	document.getElementsByTagName("footer")[0].removeChild(document.getElementsByTagName("div")[3]);

	first_box.innerHTML = "This site uses cookies, click on OK if you accept their use. <a href='#' onclick='cookie_accepted()'>OK</a>";
}


function getCookie(cookie)
{
	all_Cookie = document.cookie;
	all_Cookie = all_Cookie.split(";");
	for(i= 0; i < all_Cookie.length; i++)
	{
		if(all_Cookie[i] == cookie)
		{
			return(true);
		}
	}
	return(false);
}