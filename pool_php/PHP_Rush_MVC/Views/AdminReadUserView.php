<table width=95%>
	<tr>
		<th width="15%" class="SmallTab">Username</th>
		<th class="SmallTab">Email</th>
		<th class="SmallTab">Group</th>
		<th class="SmallTab">Status</th>
		<th class="SmallTab">Registration Date</th>
		<th class="noTable">__edit_</th>
		<th class="noTable">__delete_</th>
	</tr>

	<?php
	foreach ($this->getUsers() as $key => $value)
	{
		echo('<tr>');
		echo('<td>'.$value["username"].'</td>');
		echo('<td>'.$value["email"].'</td>');
		echo('<td width=15%>'.$value["group"].'</td>');
		echo('<td width=10%>'.$value["status"].'</td>');
		echo('<td>'.$value["creation_date"].'</td>');
		echo('<td class="linkED"><a href=/PHP_Rush_MVC/Admin/Edit_User/'.$value["id"].' class="linkED">Edit</a></td>');
		echo('<td class="linkED"><a href=/PHP_Rush_MVC/Admin/Delete_User/'.$value["id"].' class="linkED">Delete</a></td>');
		echo('</tr>');
	}
	?>

</table>