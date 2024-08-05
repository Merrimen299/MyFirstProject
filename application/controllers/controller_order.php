<?php

use application\core\Controller;
use application\core\View;
use application\models\model_order;

class Controller_Order extends Controller
{
    function __construct($params)
    {
        $this->view = new View;
        $this->model = new model_order();
        $this->params = $params;
    }
    function action_index()
    {
        session_start();
        if (isset($_SESSION['basket']))
        {
            if (isset($_SESSION['user'])){
                $this->view->generate('order/order.php', 'layouts/template_view.php', 'Оформлення замовлення');
            }
            else{
                header('location: https://fitwear/user/login');
            }
        }else{
            header('location: https://fitwear');
        }
    }
    function action_add(){
        session_start();
        if(!empty($_POST) && isset($_SESSION['user']) && isset($_SESSION['basket'])){
            $uniq_num = '';
            $count = 0;
            while ($count < 10){
                $uniq_num .= rand(0, 9);
                if ($count == 2 || $count == 5)
                    $uniq_num .= '-';
                $count += 1;
            }
            $sum = 0;
            foreach ($_SESSION['basket'] as $item) {
                if ($item['product_discount'] != 0){
                    $sum += round($item['product_price'] * (100 - $item['product_discount'])/100) * $item['basket_product_count'];
                }
                else{
                    $sum += $item['product_price'] * $item['basket_product_count'];
                }
            }
            $products = '';
            foreach ($_SESSION['basket'] as $item){
                $products .= $item['product_id'] . '-' . $item['product_size'] . '-' . $item['basket_product_count'] . ', ';
                foreach (explode(', ', $item['product_sizes']) as $size){
                    if(explode('-', $size)[0] == $item['product_size']){
                        $old_sizes = $size;
                        break;
                    }
                    else
                        $old_sizes = '';
                }
                $new_sizes = str_replace($old_sizes, $item['product_size'] . '-' . (explode('-', $old_sizes)[1] - $item['basket_product_count']), $item['product_sizes']);
                $this->model->updateProductCount($new_sizes, $item['product_id']);
            }
            $products = substr($products, 0, -2);
            $order = [
                'order_number' => $uniq_num,
                'order_user_id' => $_SESSION['user']['user_id'],
                'order_user_name' => $_POST['firstName'] . ' ' . $_POST['middleName'] . ' ' . $_POST['lastName'],
                'order_user_email' => $_POST['email'],
                'order_user_phone_num' => $_POST['phone_num'],
                'order_products' => $products,
                'order_sum' => $sum,
                'order_discount' => 0,
                'order_type' => $_POST['delivery'] == 'by_own' ? 'Самовиніс' : 'Доставка',
                'order_adress' => $_POST['delivery'] == 'by_own' ? '' : $_POST['address'] . ', ' . $_POST['city'] . ', ' . $_POST['region'] . ', ' . $_POST['index'],
                'order_status' => $_POST['payment'] == 'now' && isset($_POST['cc-number']) && isset($_POST['cc-expiration']) && isset($_POST['cc-cvv']) ? 'Замовлення сплачено' : 'Замовлення створено',
            ];
            $res = $this->model->createOrder($order);
            unset($_SESSION['basket']);
            header('location: https://fitwear/user/order_history');
        }
    }
    function action_cancel(){
        session_start();
        if(isset($_SESSION['user'])){
            if (!empty($this->params)){
                $order = $this->model->getOrder($this->params);
                $order_products = explode(', ', $order['order_products']);
                foreach ($order_products as $item){
                    $product_old_sizes = $this->model->getOrderProductSizes(explode('-', $item)[0])['product_sizes'];
                    foreach (explode(', ', $product_old_sizes) as $old_size){
                        if (explode('-', $old_size)[0] == explode('-', $item)[1]){
                            $new_sizes = str_replace($old_size, explode('-', $old_size)[0] . '-' . (explode('-', $old_size)[1] + explode('-', $item)[2]), $product_old_sizes);
                            $this->model->updateProductCount($new_sizes, explode('-', $item)[0]);
                        }
                    }
                }
            $params = [
                'order_status' => 'Замовлення скасовано',
                'order_time' => date('Y-m-d'),
                'order_id' => $this->params
            ];
            $this->model->setOrderStatus($params);
            }
            if ($_SESSION['user']['user_role_ability'] == 2){
                header('location: https://fitwear/admin/orders');
            }else{
                header('location: https://fitwear/user/order_history');
            }
        }
    }
    function action_clear(){
        session_start();
        if(isset($_SESSION['user'])){
            if (!empty($this->params)){
                $this->model->deleteOrder($this->params);
                header('location: https://fitwear/user/order_history');
            }
        }
    }
}
