<?php
session_start();
unset($_SESSION['login_user']);
unset($_SESSION['userlevel']);
session_destroy();

header("location:../index.php");

exit;
?>