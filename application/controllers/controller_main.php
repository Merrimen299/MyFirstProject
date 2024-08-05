<?php

use application\core\Controller;
use application\core\View;
use application\models\model_main;

include 'application/instruments/functions.php';

class Controller_Main extends Controller
{
    function __construct($params)
    {
        $this->view = new View;
        $this->model = new model_main();
        $this->params = $params;
    }

    function action_index()
    {
        $data['products'] = $this->model->getProducts();
        $data['brands'] = $this->model->getBrands();
        $this->view->generate('main/main_view.php', 'layouts/template_view.php', 'Головна', $data);
    }

    function action_catalog(){
        if(empty($this->params)){
            header('location: https://fitwear');
        }else{
            $parameters = explode('/', $this->params);

            $filters = [
                'category' => $parameters[0] == 'categories-all' ? null : $parameters[0],
            ];
            if ($parameters[1] == 'male'){
                $filters['gender'] = 'Чоловіча';
            }elseif ($parameters[1] == 'female'){
                $filters['gender'] = 'Жіноча';
            }elseif ($parameters[1] == 'child'){
                $filters['gender'] = 'Дитяча';
            }
            if (count($parameters) == 3){
                $parameters = trim($parameters[2], '?');
                $arr = explode('&', $parameters);
                foreach ($arr as $item){
                    $filters[explode('=', $item)[0]] = explode('=', $item)[1];
                }
            }
            $data['products'] = $this->model->getProducts($filters);;
            $data['count_products'] = $this->model->getCountProducts($filters)['count'];
            $data['categories'] = $this->model->getCategories();
            $data['brands'] = $this->model->getBrands();
            $data['prices'] = $this->model->getMinAndMaxPrices();
            $this->view->generate('main/catalog.php', 'layouts/template_view.php', 'Каталог', $data);
        }
    }
}
