<table width=80%>
	<tr>
		<th>Title</th>
		<th>Content</th>
		<th>Tags</th>
		<th>Published</th>
		<th class="noTable">edit_edit</th>
		<th class="noTable">del_delete</th>
	</tr>
	
<?php
foreach ($this->getMyArticles() as $key => $value)
{

	echo('<tr>');
	echo('<td><a href=/PHP_Rush_MVC/Writer/Read_My_Articles/'.$value["id"].'>'.$value["title"].'</td>');
	echo('<td width=30%>'.($echo = substr($value["content"],0,100)).((strlen($echo) >= 100)? "..." : "").'</td>');
	echo('<td>'.$value["tags"].'</td>');
	echo('<td>'.$value["creation_date"].'</td>');
	echo('<td class="linkED"><a href=/PHP_Rush_MVC/Writer/Edit_My_Article/'.$value["id"].' class="linkED">Edit</a></td>');
	echo('<td class="linkED"><a href=/PHP_Rush_MVC/Writer/Delete_My_Article/'.$value["id"].' class="linkED">Delete</a></td>');
	echo('</tr>');
}

?>
</table>

<a href="/PHP_Rush_MVC"><button>BACK</button></a>


