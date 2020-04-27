<?php
session_start();
unset($_SESSION['connected']);
unset($_SESSION['id']);
header("Location: /connection.php");
?>