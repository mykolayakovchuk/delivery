<?php
/**Класс обращения к БД
 * 
 * return PDO object
 */
class Model 
{
    function __construct($connection) {
        $this->connection = $connection;
    }

    protected $connection;//PDO подключение к БД

    function getFromDatabase($query){
        return $this->connection->query($query);
    }

 }
?>