<?php
use application\core\Controller;
use application\core\View;

class Controller_Admin extends \application\core\Controller
{
    function __construct($params)
    {
        $this->model = new \application\models\Model_Admin();
        $this->view = new View();
        $this->params = $params;
    }
    function action_account()
    {
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2){
            $this->view->generate('admin/admin_account.php', 'layouts/template_view.php', 'Адміністратор');
        }
        else
            header('location: https://fitwear/user/login');
    }
    function action_comments()
    {
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2){
            if (!empty($this->params)){
                $params = explode('/', $this->params);
                if (count($params) == 2 && ($params[0] == 'add' || $params[0] == 'cancel')){
                    $status = $params[0] == 'add' ? 'published' : 'denied';
                    $data['params'] = [
                        'comment_status' => $status,
                        'comment_time' => date('Y-m-d H:i:s'),
                        'comment_id' => $params[1]
                    ];
                    $this->model->setCommentStatus($data['params']);
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'text' => $params[0] == 'add' ? 'Коментар опубліковано!' : 'Коментар відхилено'
                    ];
                }
                else{
                    $_SESSION['message'] = [
                        'type' => 'warning',
                        'text' => 'Помилка зміни стану коментаря!',
                    ];
                }
                header('location: https://fitwear/admin/comments');
            }
            $data['comments'] = $this->model->getComments();
            $this->view->generate('admin/comments.php', 'layouts/template_view.php', 'Коментарі', $data);
        }
        else
            header('location: https://fitwear/user/login');
    }
    function action_orders(){
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2){
            if (!empty($this->params)){
                $params = explode('/', $this->params);
                if (count($params) == 2 && ($params[0] == 'add' || $params[0] == 'cancel' || $params[0] == 'ready' || $params[0] == 'delivery' || $params[0] == 'received')){
                    $status = match ($params[0]) {
                        'add' => 'Замовлення прийнято',
                        'cancel' => 'Замовлення скасовано',
                        'ready' => 'Замовлення в очікуванні',
                        'delivery' => 'Замовлення відправлено',
                        'received' => 'Замовлення отримано',
                    };
                    $data['params'] = [
                        'order_status' => $status,
                        'order_time' => date('Y-m-d'),
                        'order_id' => $params[1]
                    ];
                    $this->model->setOrderStatus($data['params']);
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'text' => $params[0] == 'add' ? 'Коментар опубліковано!' : 'Коментар відхилено'
                    ];
                }
                else{
                    $_SESSION['message'] = [
                        'type' => 'warning',
                        'text' => 'Помилка зміни стану коментаря!',
                    ];
                }
                header('location: https://fitwear/admin/orders');
            }
            $data['orders'] = $this->model->getOrders();
            $data['orders_products'] = [];
            foreach ($data['orders'] as $key => $group) {
                if ($key == 'count')
                    continue;
                foreach ($group as $order) {
                    foreach (explode(', ', $order['order_products']) as $order_product) {
                        $prod_id = explode('-', $order_product)[0];
                        $product = $this->model->getOrderProduct($prod_id);
                        $data['orders_products'][$order['order_id']][$prod_id] = $product;
                        $data['orders_products'][$order['order_id']][$prod_id]['product_size'] = explode('-', $order_product)[1];
                        $data['orders_products'][$order['order_id']][$prod_id]['product_count'] = explode('-', $order_product)[2];
                    }
                }
            }
            $this->view->generate('admin/orders.php', 'layouts/template_view.php', 'Замовлення', $data);
        }
        else
            header('location: https://fitwear/user/login');
    }
    function action_users(){
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2){
            $data['users'] = $this->model->getUsers($_SESSION['user']['user_id']);
            $this->view->generate('admin/users.php', 'layouts/template_view.php', 'Користувачі', $data);
        }
        else
            header('location: https://fitwear/user/login');
    }
    function action_stats(){
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2){
            $data['orders'] = $this->model->getOrdersByYear(2024);
            $this->view->generate('admin/stats.php', 'layouts/template_view.php', 'Статистика', $data);
        }
        else
            header('location: https://fitwear/user/login');
    }

}