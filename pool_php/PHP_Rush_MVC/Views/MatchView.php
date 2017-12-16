<table>

<?php
if(NULL !== $this->getMatch())
{
	foreach($this->getMatch() as $key => $value)
	{
		echo('<tr><td class="articleTitle" colspan=2 width=100%><a href=/PHP_Rush_MVC/comment/Read_Article/'.$value["id"].'>'.$value["title"].'</td></tr>');
		echo('<tr><td class="articleAttribute" width=25%>Tags</td><td>'.$value["tags"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Author</td><td>'.$value["creator"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Category</td><td>'.$value["category"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Published</td><td>'.$value["creation_date"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Last modification</td><td>'.$value["modification_date"].'</td></tr>');
	}
}
else
{
	echo("No match found. Sorry.");
}
?>

</table>


<a href="/PHP_Rush_MVC/comment/Read_Article/".$value["id"]></a>