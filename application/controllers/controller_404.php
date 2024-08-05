<?php

use application\core\Controller;

class Controller_404 extends Controller{
    function action_index()
    {
        $this->view->generate('404/404_view.php', 'layouts/template_view_404.php', '404 error');
    }
}