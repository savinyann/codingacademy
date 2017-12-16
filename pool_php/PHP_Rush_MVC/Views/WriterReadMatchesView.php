<table width="80%">
	<tr>
		<th width=15%>Title</th>
		<th width=40%>Content</th>
		<th width=10%>tags</th>
		<th width=15%>published</th>
		<th class="noTable">_edit_</th>
		<th class="noTable">_delete_</th>
	</tr>
	
<?php
foreach ($this->getMatch() as $key => $value)
{
	echo('<tr>');
	echo('<td>'.$value["title"].'</td>');
	echo('<td>'.$value["content"].'</td>');
	echo('<td>'.$value["tags"].'</td>');
	echo('<td>'.$value["creation_date"].'</td>');
	echo('<td class="linkED"><a href=/PHP_Rush_MVC/Writer/Edit_My_Article/'.$value["id"].'>Edit</a></td>');
	echo('<td class="linkED"><a href=/PHP_Rush_MVC/Writer/Delete_My_Article/'.$value["id"].'>Delete</a></td>');
	echo('</tr>');
}

?>
</table>


<a href="/PHP_Rush_MVC/Writer/Read_My_Articles"><button>BACK</button></a>

