<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>DELIVERY TEST</title>
<!--
<link rel="stylesheet" href="**.css">
-->
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="menu.css">
<link rel="stylesheet" href="main.css">
</head>
<body> 

<?php 
//подключение к базе
//return $connection
include "db-cfgLOCAL.php";
//основное меню приложения
include "menu.php";
echo "<main>";
switch ($_GET["menu"]) {
    //вход в панель администратора; 
    case "admin":
        echo "admin";
    break;
    //Добавить пользователя; 
    case "addUser":
        include "addUserForm.php";//форма добавления пользователя
        if (isset($_POST["username"])){
            $addUserQuery = $connection->prepare("INSERT INTO del_user (id, username) VALUES (NULL, :name)");
            $addUserQuery->bindParam(':name', $_POST["username"]);
            $addUserQuery->execute();    
            echo "пользователь добавлен";
        }
    break;
    //Добавить задачу; 
    case "addTask": 
        echo "addTask";
    break;
    //Все задачи; 
    default:
       echo "index";
}
echo "</main>";
?>

</body>
</html> 