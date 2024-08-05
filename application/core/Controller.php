<?php

namespace application\core;

class Controller
{
    public $model;
    public $view;
    public $params;

    function __construct($params)
    {
        $this->view = new View();
        $this->params = $params;
    }

    function action_index()
    {
    }

    public static function throwMessage($type, $text){
        echo '<div class="mt-3 alert alert-'.$type.'" role="alert">'.$text.'</div>';
    }
}