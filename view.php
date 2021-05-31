<?php
/**Класс создания вида
 * 
 * 
 */
class View
{
    //шапка таблицы Буцтрап
    public $tableHead='
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Номер задачи</th>
            <th scope="col">Пользователь</th>
            <th scope="col">e-mail</th>
            <th scope="col">Текст задачи</th>
            </tr>
        </thead>
        <tbody>
    ';
/**функция создания вида задач для пользователей
 * 
 */

    function createViewForUser($objectPDO){
        foreach ($objectPDO as $row){
            print_r($row);
        }
    }

 }
?>