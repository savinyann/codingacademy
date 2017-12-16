<table width=80%>
		<!--
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th>Tags</th>
			<th>Author</th>
			<th>Category</th>
			<th>published</th>
			<th>Last modification</th>
			<th class="noTable">comment_comment</th>
		</tr>
		-->

		<?php
		echo('<tr><td class="articleTitle" colspan=2 width=100%>'.$this->getMyArticle()["title"].'</td></tr>');
		echo('<tr><td colspan=2>'.$this->getMyArticle()["content"].'</td></tr><tr><td colspan=2 class="noTable noText">space</td></tr>');
		echo('<tr><td class="articleAttribute" width=25%>Tags</td><td>'.$this->getMyArticle()["tags"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Author</td><td>'.$this->getMyArticle()["creator"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Category</td><td>'.$this->getMyArticle()["category"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Published</td><td>'.$this->getMyArticle()["creation_date"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Last modification</td><td>'.$this->getMyArticle()["modification_date"].'</td></tr>');
		echo('<tr><td class="read"><a href=/PHP_Rush_MVC/comment/Create_Comment/'.$this->getMyArticle()["id"].'>Comment !</a></td></tr>');
		?>
	</table>

<?php
if(count($this->getMyArticle()["comments"]) > 0)
{
	echo('<table><tr><th>Content</th><th>Writed by</th><th>publied</th></tr>');
	foreach ($this->getMyArticle()["comments"] as $key => $value)
	{
		echo('<tr><td>'.$value["content"].'</td>');
		echo('<td>'.$value["creator"].'</td>');
		echo('<td>'.$value["creation_date"].'</td>');
		echo ('</tr>');
	}
	echo('</table>');
}
?>

<a href="/PHP_Rush_MVC/Writer/Read_My_Articles"><button>BACK</button></a>


