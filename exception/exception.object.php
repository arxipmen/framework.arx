<?php
/**
 * User: arxipmen
 * Date: 16.09.14
 * Time: 21:22
 * ExceptionObject - ошибки класса, связанные с использованием переменных не являющихся объектами.
 */

class ExceptionObject extends Exception {

// Имя объекта
    protected $key;

    public function __construct($key, $message){
        $this->key;
        parent::__construct($message);
    }

    public function getKey(){
        return $this->key;
    }
}