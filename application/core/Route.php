<?php

namespace application\core;

use PDO;

class Route
{

    static function start()
    {
        // контролер та дія за замовчуванням
        $controller_name = 'Main';
        $action_name = 'index';
        $params = [];

        $routes = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        // отримуємо ім’я контролера
        if ( !empty($routes[0]) )
        {
            $controller_name = $routes[0];
        }

        // отримуємо ім’я екшена
        if ( !empty($routes[1]) )
        {
            $action_name = $routes[1];
        }
        if ( !empty($routes[2]) )
        {
            if (empty($routes[3])){
                $params = $routes[2];
            }
            else{
                $params = '';
                for ($i = 2; $i < count($routes); $i++){
                    $params = $params . $routes[$i] . '/';
                }
                $params = substr($params, 0, -1);
            }
        }

        // додаємо префікси
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // підчеплюємо файл з класом моделі (файлу моделі може і не бути)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }
        // підчеплюємо файл з класом  контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            /*Тут вірно записати виключення, але ми одразу робимо
        переключення на сторінку 404*/
            Route::ErrorPage404();
        }

        // створюємо контролер
        $controller = new $controller_name($params);
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            // тут потрібно записати виключення
            Route::ErrorPage404();
        }

    }

    static function connect(){
        $user = "root";
        $password = "";
        $dsn = "mysql:host=localhost;dbname=fitwear-db;port=3306;charset=utf8";
        $connection = new PDO($dsn, $user, $password);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $connection;
    }

    static function ErrorPage404(){
        $host = 'https://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

}