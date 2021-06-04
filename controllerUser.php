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
            $pagination=($_GET["page"]*3)-3;
        }else{
            $pagination=0;
        }
        $query="SELECT del_task.id, del_user.username, del_task.email, del_task.text_task, id_status
        FROM del_task
        LEFT JOIN del_user
        ON del_task.id_user = del_user.id".
        self::queryFilter() 
        ." ORDER BY del_task.id
        LIMIT ".$pagination.", 3;";
        return $query;
    }

/**функция изменения запроса (фильтрации) (т.е. сортировки по пользователю, статусу и т.д.)
 * в зависимости от выбраных GET параметров
 * параметров фильтрации
 * return String
 * 
 */
    public static function queryFilter(){
        $queryPartArray=[];
        $queryPart="";
        if (isset($_GET["filteruser"]) && $_GET["filteruser"] != ""){
            $queryPartArray[]="id_user = '".$_GET["filteruser"]."'";
        }
        if (isset($_GET["filterstatus"]) && $_GET["filterstatus"]!= ""){
            $queryPartArray[]="id_status = '".$_GET["filterstatus"]."'";
        }
        if (count($queryPartArray) > 1){
            $queryPart = " WHERE ". implode(" AND ", $queryPartArray);
        }else if ($queryPartArray[0] != NULL){
            $queryPart = " WHERE ". $queryPartArray[0];
        }
        return $queryPart;
    }

/**функция создания запроса
 * для редактирования задачи
 * return String
 * 
 */
    public function updateTaskQuery($idTask, $textTask, $statusTask){
        $query= "UPDATE";
        return $query;
    }

/**функция создания строки запроса в БД
 * Запрашиваем одну строку, для заполнения формы редактирования
 * return String
 */
public function generateQueryForSpecificTask($idTask){
    $query='SELECT del_task.id, del_user.username, del_task.email, del_task.text_task, id_status
    FROM del_task
    LEFT JOIN del_user
    ON del_task.id_user = del_user.id
    WHERE del_task.id ="'.$idTask.'";';
    return $query;
}
}

?>