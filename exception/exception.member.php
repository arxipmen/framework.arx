<?php
/**
 * User: arxipmen
 * Date: 16.09.14
 * Time: 21:07
 * ExceptionMember - ошибки класса, связанные с обращением к несуществующим членам класса.
 */

class ExceptionMember extends Exception {

// Имя несуществующего члена
    protected $key;

    public function __construct($key, $message){
        $this->key = $key;
        parent::__construct($message);              // Вызываем конструктор базового класса
    }

    public function getKey(){
        return $this->key;
    }
}