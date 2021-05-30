<?php
//$connection = mysqli_connect('localhost', 'root', 'root', 'delivery');
//$connection->set_charset("utf8");

//if (mysqli_connect_errno()) {
////    echo 'Ошибка в подключении к базе данных (' . mysqli_connect_errno() . '): ' . mysqli_connect_error();
//    exit();
//}

$connection = new PDO('mysql:host=localhost;dbname=delivery', 'root', 'root');

