<?php
/**
 * User: arxipmen
 * Date: 16.09.14
 * Time: 21:30
 * ExceptionMySQL - ошибки класса, связанные с обращением к базе MySQL.
 */

class ExceptionMySQL extends Exception {

    protected $mysql_error;         // Сообщение об ошибки
    protected $sql_query;           // SQL-запрос

    public function __construct($mysql_error, $sql_query, $message){
        $this->mysql_error = $mysql_error;
        $this->sql_query = $sql_query;
        parent::__construct($message);
    }

    public function getMySQLError(){
        return $this->mysql_error;
    }

    public function getSQLQuery(){
        return $this->sql_query;
    }
}