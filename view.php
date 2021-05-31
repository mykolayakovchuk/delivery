<?php
/**Класс создания вида
 * 
 * 
 */
class View
{
    //шапка таблицы Буцтрап
    public $tableHead='
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Номер задачи</th>
            <th scope="col">Пользователь</th>
            <th scope="col">e-mail</th>
            <th scope="col">Текст задачи</th>
            <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
    ';
    //низ таблицы Буцтрап
    public $tableBottom='
    </tbody>
    </table>
    ';
    /**функция создания вида задач для пользователей
     * возвращает таблицу HTML
     * заполненную данными из БД
     * 
     * return String
     * 
     */

    function createViewForUser($objectPDO){
        $table=$this->tableHead;
        foreach ($objectPDO as $row){
            if ($row['id_status'] == 1){
                $status="В работе";
            }else{
                $status="Выполнено";
            }
            $table=$table.
            '<tr>
            <th scope="row">'.$row['id'].'</th>
            <td>'.$row['username'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['text_task'].'</td>
            <td>'.$status.'</td>
          </tr>';
        }
        $table=$table.$this->tableBottom;
        return $table;
    }

    /**функция создания кнопок пагинации
     * 
     * return String
     * 
     */
    function createPagination($rowsTable){
        $html="<ul class='pagination'>";
        $html=$html."<li><a href='index.php?page=1'>Начало</a></li>";
        if (isset($_GET["page"])){
            $currentPage=$_GET["page"];
        }else{
            $currentPage=1;
        }
        $counter=1;
        do {
            $html=$html."<li><a href='index.php?page=".$currentPage."'>".$currentPage."</a></li>";
            $currentPage++;
            $counter++;
        } while (($currentPage > ceil($rowsTable/3)) xor ($counter < 11));
        $html=$html."</ul>";
        return $html;
    }

 }
?>
