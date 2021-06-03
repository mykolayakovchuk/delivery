<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>DELIVERY TEST</title>
<!--
<link rel="stylesheet" href="**.css">
-->
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="menu.css">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="pagination.css">
</head>
<body> 

<?php
//загрузка класса контроллера
include "controllerUser.php";
//загрузка класса модели
include "model.php";
//загрузка класса вида
include "view.php";
//подключение к базе
//return $connection
include "db-cfgLOCAL.php";
//основное меню приложения
include "menu.php";
echo "<main>";
switch ($_GET["menu"]) {
    //вход в панель администратора; 
    case "admin":
        //форма для ввода и проверки пароля
        if (isset($_SESSION["userRole"]) == FALSE 
            && isset($_POST["login"]) == FALSE 
            && isset($_POST["password"]) == FALSE){
            include "authorizationForm.php";
        }else if(isset($_SESSION["userRole"]) == FALSE 
        && $_POST["login"] != "admin" 
        && $_POST["password"] != "123"){
            include "authorizationForm.php";
            echo "Неверный пароль";
        }else if(isset($_SESSION["userRole"]) == FALSE 
        && $_POST["login"] == "admin" 
        && $_POST["password"] == "123")
        {
            $_SESSION["userRole"] = "admin";
        }
        
        //панель администратора
        if ($_SESSION["userRole"] == "admin" ){
            //выход из режима администратора
            echo "welcome";
            $Controller= new ControllerUser;
            $query=$Controller->generateQuery();
            $Model= new Model($connection);
            $tasks=$Model->getFromDatabase($query);
            $View= new View;
            echo ($View->createPagination($Model->getNumberRows()));
            echo ($View->createFiltartionForm($Model));
            echo ($View->createViewForUser($tasks));
        }

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
       $Controller= new ControllerUser;
       $query=$Controller->generateQuery();
       $Model= new Model($connection);
       $tasks=$Model->getFromDatabase($query);
       $View= new View;
       echo ($View->createPagination($Model->getNumberRows()));
       echo ($View->createFiltartionForm($Model));
       echo ($View->createViewForUser($tasks));
}
echo "</main>";

?>
<!-- Вариант 1: Bootstrap в связке с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html> 