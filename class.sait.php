<?php
/**
 * User: arxipmen
 * Date: 31.08.14
 * Time: 20:09
 */

abstract class sait {
    protected $name;                // Имя элемента управления
    protected $type;                // Тип элемента управления
    protected $caption;             // Название слево от элемента
    protected $value;               // Значение элемента
    protected $is_required;         // Обязательный элемент к заполнению или нет
    protected $parameters;          // Дополнительные параметры
    protected $help;                // Подсказка
    protected $help_url;            // Ссылка на подсказку

    public $css_class;              // Класс CSS
    public $css_style;              // Стиль CSS

// Конструктор класса
    function __construct(
        $name,
        $type,
        $caption,
        $is_required = false,
        $value = "",
        $parameters = "",
        $help = "",
        $help_url = ""
    )
    {
        $this->name        = $this->encodestring($name);
        $this->type        = $type;
        $this->caption     = $caption;
        $this->value       = $value;
        $this->is_required = $is_required;
        $this->parameters  = $parameters;
        $this->help        = $help;
        $this->help_url    = $help_url;
    }

// Метод проверки корректности заполнения поля
    abstract function check();

// Метод возвращения тега элемента управления
    abstract function get_html();

// Метод доступа к защищенным элементам
    public function __get($key) {
        if(isset($this->$key)) return $this->$key;
        else {
            throw new ExceptionMember($key, "Член ".__CLASS__."::$key не существует");
        }
    }
// Функция перевода русского в транслит
    protected function encodestring($st) {
        $st = strtr($st, "абвгдеёзийклмнопрстуфхъыэ_", "abvgdeeziyklmnoprstufh'iei");
        $st = strtr($st, "АБВГДЕЁЗИКЛМНОПРСТУФХЪЫЭ_", "ABVGDEEZIKLMNOPRSTUFH'IEI");
        $st = strtr($st, array(
                                "ж"=>"zh","ц"=>"ts","ч"=>"ch","ш"=>"sh",
                                "щ"=>"shch","ь"=>"","ю"=>"yu","я"=>"ya",
                                "Ж"=>"ZH","Ц"=>"TS","Ч"=>"CH","Ш"=>"SH",
                                "Щ"=>"SHCH","Ь"=>"","Ю"=>"YU","Я"=>"YA")
        );
        return $st;
    }
} 