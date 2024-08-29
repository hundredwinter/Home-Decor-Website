<?php
session_start();
session_destroy();
header("Location: hd-login.php");
?>
