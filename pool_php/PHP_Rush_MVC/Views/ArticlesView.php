<table width=80%>
	<tr>
		<th class="tabH">Title</th>
		<th class="tabH">Published</th>
		<th class="noTable">Read_Read</th>
	</tr>

	<?php
		foreach ($this->getArticles() as $key => $value)
		{
			echo('<tr>');
			echo('<td class="articleSmallTitle">'.$value["title"].'</td>');
			echo('<td class="date">'.$value["creation_date"].'</td>');
			echo('<td class="read"><a href=/PHP_Rush_MVC/comment/Read_Article/'.$value["id"].'>Read</a></td>');
			echo('</tr>');
		}
	?>
</table>


<?php

foreach ($this->getArticles() as $key => $value)
{
	# code...
}


?>