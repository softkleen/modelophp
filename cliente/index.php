<?php 
if(isset($_GET['cliente'])){
    $cliente = $_GET['cliente'];
    echo "<h2> Olá, ".$cliente.", seja bem vindo à sua área!<h2>";
}

?>