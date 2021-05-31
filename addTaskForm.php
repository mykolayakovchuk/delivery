<form action="index.php?menu=addTask" method="POST">
    <p><label for="idUser">Имя пользователя</label>
    <select name="idUser" required>
<?php
//Вывод из базы всех пользователей
$queryUsers = 'SELECT id, username FROM del_user ORDER BY username';
$users=$connection->query($queryUsers);
foreach ($users as $user){
    echo "<option value=".$user['id'].">".$user['username']."</option>";
}
?>
    </select></p>
    <p>
        <label for="email">Адрес электронной почты</label>
        <input type="text" name="email" required/>
    </p>
    <p>
        <label for="textTask">Текст задачи</label>
        <textarea type="text" name="textTask" required></textarea>
    </p>
    <p>
        <input type="submit" value="Создать задачу">
    </p>
</form>