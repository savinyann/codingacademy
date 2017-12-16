<?php

	if(NULL !== $this->getMessage())
	{
		echo '<div class="divMain">';
		foreach ($this->getMessage() as $key => $value)
		{
			echo($value."<br>");
		}
		echo'</div>';
	}
?>