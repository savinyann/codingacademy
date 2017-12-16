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
		echo('<tr><td class="articleTitle" colspan=2 width=100%>'.$this->getArticle()["title"].'</td></tr>');
		echo('<tr><td colspan=2>'.$this->getArticle()["content"].'</td></tr><tr><td colspan=2 class="noTable noText">space</td></tr>');
		echo('<tr><td class="articleAttribute" width=25%>Tags</td><td>'.$this->getArticle()["tags"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Author</td><td>'.$this->getArticle()["creator"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Category</td><td>'.$this->getArticle()["category"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Published</td><td>'.$this->getArticle()["creation_date"].'</td></tr>');
		echo('<tr><td class="articleAttribute">Last modification</td><td>'.$this->getArticle()["modification_date"].'</td></tr>');
		echo('<tr><td class="read"><a href=/PHP_Rush_MVC/comment/Create_Comment/'.$this->getArticle()["id"].'>Comment !</a></td></tr>');
		?>
	</table>

<?php
if(count($this->getArticle()["comments"]) > 0)
{
	echo('<table width=80%><tr><th width=40%>Content</th><th width=15%>Writed by</th><th width=15%>Publied</th><th class="noTable">Edit comment</th><th class="noTable">Delete comment</th></tr>');
	foreach ($this->getArticle()["comments"] as $key => $value)
	{
		echo('<tr><td>'.$value["content"].'</td>');
		echo('<td>'.$value["creator"].'</td>');
		echo('<td>'.$value["creation_date"].'</td>');
		echo('<td class="linkED">'.(($value["creator"] == $_SESSION["user"]["username"]) ? '<a href=/PHP_Rush_MVC/comment/Edit_Comment/'.$this->getArticle()["id"].'/'.$value["id"].'>Edit Comment</a>' : "").'</td>');
		echo('<td class="linkED">'.(($value["creator"] == $_SESSION["user"]["username"]) ? '<a href=/PHP_Rush_MVC/comment/Delete_Comment/'.$this->getArticle()["id"].'/'.$value["id"].'>Delete Comment</a>' : "").'</td>');
		echo ('</tr>');
	}
	echo('</table>');
}
?>

<a href="/PHP_Rush_MVC"><button>BACK</button></a>