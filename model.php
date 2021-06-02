<?php
/**Класс обращения к БД
 *
 */

class Model 
{
    function __construct($connection) {
        $this->connection = $connection;
    }

    /**запрос для вывода всех пользователей
     * 
     */
    public $allUsersQuery="SELECT * FROM del_user";

    /**запрос для вывода всех статусов
     * 
     */
    public $allStatusQuery="SELECT * FROM del_status";

    protected $connection;//PDO подключение к БД
    /**Функция выполнения запроса к БД
     * 
     * return PDO object
     */
    function getFromDatabase($query){
        return $this->connection->query($query);
    }
    /**Функция подсчета строк в таблице
     * 
     * return int
     */
    function getNumberRows(){
        $numberRows = $this->connection->query("SELECT COUNT(*) FROM del_task".ControllerUser::queryFilter())->fetchColumn();
        return $numberRows;
    }


 }
?>