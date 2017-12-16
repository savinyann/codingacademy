<?php
session_start();
session_unset();
session_destroy();
session_reset();
header("Location: login.php");
?>