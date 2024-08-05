<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_Basket;

class Controller_Basket extends Controller
{
    function __construct($params)
    {
        $this->model = new Model_Basket();
        $this->view = new View();
        $this->params = $params;
    }
    function action_index(){
        $this->view->generate('basket/basket.php', 'layouts/template_view.php', 'Кошик');
    }
    function action_add(){
        session_start();
        if (!empty($this->params && !empty($_POST))){
            $checker = false;
            foreach ($_SESSION['basket'] as $item){
                if ($item['product_id'] == $this->params && $item['product_size'] == $_POST['size']){
                    $checker = true;
                }
            }
            if ($checker){
                $_SESSION['basket'][$this->params.$_POST['size']]['basket_product_count'] += 1;
            }
            else{
                $_SESSION['basket'][$this->params.$_POST['size']] = $this->model->getProduct($this->params);
                $_SESSION['basket'][$this->params.$_POST['size']]['basket_product_count'] = 1;
                $_SESSION['basket'][$this->params.$_POST['size']]['product_size'] = $_POST['size'];
            }
        }
        else{
            $_SESSION['message'] = [
                'type' => 'danger',
                'text' => 'Помилка додавання товару до кошика!',
            ];
        }
        header('location: https://fitwear/basket');
    }
    function action_update(){
        session_start();
        if (!empty($this->params)){
            $parameters = explode('/', $this->params);
            $_SESSION['basket'][$parameters[0]]['basket_product_count'] = $parameters[1];
            header('location: https://fitwear/basket');
        }
    }

    function action_delete(){
        session_start();
        $itemID = $this->params;
        unset($_SESSION['basket'][$itemID]);
        if (count($_SESSION['basket']) == 0)
            unset($_SESSION['basket']);
        header('location: https://fitwear/basket');
    }
    function action_clear(){
        session_start();
        unset($_SESSION['basket']);
        header('location: https://fitwear/basket');
    }

}