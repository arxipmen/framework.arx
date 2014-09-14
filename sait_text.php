<?php
/**
 * User: arxipmen
 * Date: 02.09.14
 * Time: 20:54
 */

class sait_text extends sait {
    public $size;                       // Размер текстового поля
    public $maxlength;                  // Максимальный размер вводимых данных

// Конструктор класса
    function __construct(
                        $name,
                        $caption,
                        $is_required = false,
                        $value = "",
                        $maxlength = 255,
                        $size = 41,
                        $parameters = "",
                        $help = "",
                        $help_url = "")
    {
        parent::__construct(
                            $name,
                            "text",
                            $caption,
                            $is_required,
                            $value,
                            $parameters,
                            $help,
                            $help_url);

        $this->size = $size;
        $this->maxlength =$maxlength;
    }

// Метод возврата имени поля и тег управления
        function get_html() {
// Учитываем переменные если они не пусты
            if(!empty($this->css_style)) {
                $style = "style=\"".$this->css_style."\"";
            } else $style = "";
            if(!empty($this->css_class)) {
                $class = "class=\"".$this->css_class."\"";
            } else $class = "";
            if(!empty($this->size)) {
                $size = "size=".$this->size;
            } else $size = "";
            if(!empty($this->maxlength)){
                $maxlength = "maxlength=".$this->maxlength;
            } else $maxlength = "";
// Формируем тег
            $tag = "<input $style $class
                    type=\"".$this->type."\"
                    name=\"".$this->name."\"
                    value=\"".htmlspecialchars($this-value, ENT_QUOTES)."\"
                    $size $maxlength>\n";
// Если поле обязательно для заполнения отмечаем *
            if($this->is_required) $this->caption .= " *";
// Создаем подсказку
            $help = "";
            if($this->help) {
                $help .= "<span style='color:blue'>".nl2br($this->help)."</span";
            }
            if(!empty($help)) $help .= "<br>";
            if(!empty($this->help_url)) $help .= "<span style='color:blue'><a href=".
                                                  $this->help_url.">Помощь</a></span>";
            return array($this->caption, $tag, $help);
        }

// Метод проверки корректности переданных данных
        function check() {
            if(!get_magic_quotes_gpc()) {
                $this->value = mysql_escape_string($this->value);
            }
            if($this->is_required) {
                if(empty($this->value)) {
                    return "Поле \"".$this->caption."\"не заполнено";
                }
            }
            return "";
        }
} 