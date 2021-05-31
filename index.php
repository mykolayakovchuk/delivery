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
        include "addTaskForm.php";//форма добавления задачи
        if (isset($_POST["idUser"]) && isset($_POST["email"]) && isset($_POST["textTask"])){
            $addTaskQuery = $connection->prepare('INSERT INTO 
            del_task (id, id_user, email, text_task) VALUES (NULL, :idUser, :email, :text_task)');
            $addTaskQuery->bindParam(':idUser', $_POST["idUser"]);
            $addTaskQuery->bindParam(':email', $_POST["email"]);
            $addTaskQuery->bindParam(':text_task', $_POST["textTask"]);
            $addTaskQuery->execute();    
            echo "задача добавлена";
        }
    break;
    //Все задачи; 
    default:
       echo "index";
}
echo "</main>";
?>

</body>
</html> 