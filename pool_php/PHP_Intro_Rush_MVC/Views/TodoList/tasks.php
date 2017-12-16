<form method="post">
	<label for="title">Title: </label>
	<input type="text" id="title" name="task_title">
	<label for="description">Description: </label>
	<textarea id="description" name="task_description"></textarea>
	<button type="submit">Submit</button>
</form>

<?php

$tasks = new TaskController;
$tasks = $tasks->getFromTask();

echo "<ul>";
foreach ($tasks as $key => $value)
{
	echo "<li>".$value["title"].": ".$value["description"]."</li><button>delete</button><a href='www.google.com'>edit</a>";
	echo "<br>";
}
?>