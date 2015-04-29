<?php 

$DB = new PDO("mysql:host=localhost;dbname=mytour", "root", "");
$DB->exec("SET CHARACTER SET utf8");

$DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>