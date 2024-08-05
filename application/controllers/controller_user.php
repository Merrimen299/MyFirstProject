<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_User;

class Controller_User extends Controller{

    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

//---------------------------------------------------------Register---------------------------------------------------------
    function action_signup()
    {
        if(!empty($_POST)){
            session_start();
            if ($_POST['pass'] == $_POST['repass']){
                if ($this->model->isRegistered($_POST['login']) == true){
                    $_SESSION['message'] = [
                        'type' => 'warning',
                        'text' => 'Користувач під цією поштою вже зареєстрований!',
                    ];
                    header('location: https://fitwear/user/login');
                }
                else{
                    $params = [
                        'user_email' => $_POST['login'],
                        'user_password' => $_POST['pass'],
                        'user_role_ability' => 1,
                        'user_firstname' => $_POST['firstname'],
                        'user_middlename' => $_POST['middlename'],
                        'user_lastname' => $_POST['lastname'],
                        'user_register_date' => date("Y-m-d")
                    ];
                    $this->model->Register($params);
                    $user = $this->model->Login($_POST['login'], $_POST['pass']);
                    $_SESSION['user'] = $user;
                    $_SESSION['message'] = [
                        'type'=>'success',
                        'text' => 'Користувач успішно зареєстрований!',
                    ];
                    header('location: https://fitwear/user/account');
                }
            }
            else{
                $_SESSION['message'] = [
                    'type' => 'warning',
                    'text' => 'Невірно підтвержений пароль!',
                ];
                $this->view->generate('user/login.php', 'template_view.php', 'Особистий кабінет');
            }
        }
        else
            $this->view->generate('user/login.php', 'template_view.php', 'Особистий кабінет');
    }


    //---------------------------------------------------------Login---------------------------------------------------------


    function action_signin(){
        if(!empty($_POST)) {
            session_start();
            $result = $this->model->Login($_POST['login'], $_POST['pass']);
            if($result != false){
                $_SESSION['message'] = [
                    'type'=>'success',
                    'text' => 'Користувач успішно увійшов!',
                ];
                $_SESSION['user'] = $result;
                if ($_SESSION['user']['user_role_ability'] == 1)
                    header('Location: account');
                else
                    header('location: https://fitwear/admin/account');
            }
            else{
                $_SESSION['message'] = [
                    'type' => 'danger',
                    'text' => 'Неправильний логін або пароль!',
                ];
                header('Location: login');
            }
        }
    }
    function action_login(){
        $this->view->generate('user/login.php', 'layouts/template_view.php', 'Особистий кабінет');
    }

    //---------------------------------------------------------logout---------------------------------------------------------


    function action_logout(){
        session_start();
        unset($_SESSION['user']);
        header('location: login');
    }

    //---------------------------------------------------------Account---------------------------------------------------------


    function action_account()
    {
        session_start();
        if(isset($_SESSION['user']))
            $this->view->generate('user/account.php', 'layouts/template_view.php', 'Аккаунт');
        else
            header('location: login');
    }

    //---------------------------------------------------------Updating Data---------------------------------------------------------


    function action_update_user_data(){
        session_start();
        if (isset($_SESSION['user'])){
            $data = [
                'user_id' => $_SESSION['user']['user_id'],
                'user_firstname' => $_POST['first_name'],
                'user_middlename' => $_POST['middle_name'],
                'user_lastname' => $_POST['last_name'],
                'user_birthday' => $_POST['birthday'] == '' ? $_POST['birthday'] : null,
                'user_phone_number' => $_POST['phone'],
                'user_adress' => $_POST['address']
            ];
            $this->model->updateUser($data);
            $_SESSION['user'] = $this->model->Login($_SESSION['user']['user_email'], $_SESSION['user']['user_password']);
            $_SESSION['message'] = [
                'type' => 'success',
                'text' => 'Дані успішно оновлено!'
            ];
            header('location: account');
        }
        else{
            header('location: login');
        }
    }

    //---------------------------------------------------------Updating Password---------------------------------------------------------

    function action_update_user_password(){
        session_start();
        if (isset($_SESSION['user'])){
            if ($_POST['new'] == $_POST['confirm']){
                $data = [
                    'user_id' => $_SESSION['user']['user_id'],
                    'user_password' => $_POST['new'],
                ];
                $this->model->updateUserPassword($data);
                $_SESSION['user']['password'] = $_POST['new'];
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Пароль успішно оновлений!'
                ];
                header('location: account');
            }
            else{
                $_SESSION['message'] = [
                    'type' => 'danger',
                    'text' => 'Помилка! Невірно підтверджений пароль!'
                ];
                header('location: account');
            }
        }
        else{
            header('location: login');
        }
    }

    function action_liked()
    {
        session_start();
        if (isset($_SESSION['user'])){
            $data['products'] = $this->model->getLiked($_SESSION['user']['user_liked_products']);
            $this->view->generate('user/liked.php', 'layouts/template_view.php', 'Мої вподобання', $data);
        }
        else{
            $_SESSION['message'] = [
                'type' => 'warning',
                'text' => 'Ви не увійшли в обліковий запис!',
            ];
            header('location: https://fitwear/user/login');
        }
    }
    function action_promo()
    {
        session_start();
        if (isset($_SESSION['user'])){
            $this->view->generate('user/promocodes.php', 'layouts/template_view.php', 'Мої промокоди');
        }
        else{
            $_SESSION['message'] = [
                'type' => 'warning',
                'text' => 'Ви не увійшли в обліковий запис!',
            ];
            header('location: https://fitwear/user/login');
        }
    }
    function action_order_history()
    {
        session_start();
        if (isset($_SESSION['user'])){
            $data['orders'] = $this->model->getUserOrders($_SESSION['user']['user_id']);
            $data['orders_products'] = [];
            foreach ($data['orders'] as $order){
                foreach (explode(', ', $order['order_products']) as $order_product){
                    $prod_id = explode('-', $order_product)[0];
                    $product = $this->model->getOrderProduct($prod_id);
                    $data['orders_products'][$order['order_id']][$prod_id] = $product;
                    $data['orders_products'][$order['order_id']][$prod_id]['product_size'] = explode('-', $order_product)[1];
                    $data['orders_products'][$order['order_id']][$prod_id]['product_count'] = explode('-', $order_product)[2];

                }
            }
            $this->view->generate('user/order_history.php', 'layouts/template_view.php', 'Історія замовлень', $data);
        }
        else{
            $_SESSION['message'] = [
                'type' => 'warning',
                'text' => 'Ви не увійшли в обліковий запис!',
            ];
            header('location: https://fitwear/user/login');
        }
    }
    function action_club_card(){
        session_start();
        if (isset($_SESSION['user'])){
            $data['club_card'] = $this->model->getClubCard($_SESSION['user']['user_id']);
            $this->view->generate('user/club_card.php', 'layouts/template_view.php', 'Клубна картка', $data);
        }
        else{
            $_SESSION['message'] = [
                'type' => 'warning',
                'text' => 'Ви не увійшли в обліковий запис!',
            ];
            header('location: https://fitwear/user/login');
        }
    }
}
