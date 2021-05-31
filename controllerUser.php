<?php
/**класс контроллера для пользователя
 * возвращает строку запроса в БД в зависимости от выбранных пользователем
 */

class ControllerUser
{
/**основная функция для пользователя
 * возвращает строку запроса в БД в зависимости от выбранных пользователем
 * параметров фильтрации
 * return String
 * 
 */
    public function generateQuery(){
        if (isset($_GET["page"])){
            echo "page:".$_GET["page"];
        }else{
            $query="SELECT del_task.id, del_user.username, del_task.email, del_task.text_task, id_status
            FROM del_task 
            LEFT JOIN del_user
            ON del_task.id_user = del_user.id
            ORDER BY del_task.id";
            return $query;
        }
    }
}

?>