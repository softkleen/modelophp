<?php 
session_name("chulettaaa");
session_start();
session_destroy();
header('Location: ../index.php');
exit;

?>