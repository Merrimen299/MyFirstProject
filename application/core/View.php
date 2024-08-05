<?php

namespace application\core;

class View
{
    public $template_view; // вид - по замовчуванню .

    function generate($content_view, $template_view, $title, $data = null )
    {
        if(is_array($data)) {
                  // перетворення елементів в масиву в змінні
                  extract($data);
        }
        include 'application/views/'.$template_view;
    }

}