<table width="65%">
	<tr><th width="60%">Category</th>
		<th class="noTable">ed_edit</th>
		<th class="noTable">del_delete</th>
	</tr>

<?php
	foreach ($this->getCategory() as $key => $value)
	{
		echo("<tr><td>".$value["name"]."</td>");
		echo((isset($value["id"])) ? "<td class='linkED'><a href=/PHP_Rush_MVC/Admin/Category_Management/".$value["id"]."/edit>Edit</a></td>" : "<td></td>");
		echo((isset($value["id"])) ? "<td class='linkED'><a href=/PHP_Rush_MVC/Admin/Category_Management/".$value["id"]."/delete>Delete</a></td>" : "<td></td>");
		echo("</tr>");
	}
?>

</table>