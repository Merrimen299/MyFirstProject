<?php

use application\core\Controller;
use application\core\View;
use application\models\Model_Product;
use application\db\Db;

class Controller_Product extends Controller
{
    function __construct($params)
    {
        $this->view = new View;
        $this->model = new Model_Product;
        $this->params = $params;
    }
    function action_index(){
        session_start();
        if (!empty($this->params)){
            if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2){
                header('location: https://fitwear/product/edit/' . explode('/',$this->params)[0]);
            }
            else{
                $data['product'] = $this->model->GetProd(explode('/',$this->params)[0]);
                if ($data['product']['product_collection_id'] != null){
                    $data['collection'] = $this->model->getCollection($data['product']['product_collection_id']);
                }
                $data['rec_products'] = $this->model->GetOtherProds($this->params);
                $this->view->generate('product/product.php', 'layouts/template_view.php', $data['product']['product_category_type_ua'].' '.$data['product']['product_brand'].' '.$data['product']['product_name'], $data);
            }
        }
    }
    function action_like(){
        session_start();
        if (isset($_SESSION['user'])){
            if (!empty($this->params)){
                $params = [
                    'product_id' => $this->params,
                    'user_id' => $_SESSION['user']['user_id']
                ];
                $product_link =  $this->model->getProdByID($params['product_id'])['product_link'];
                $check = $this->model->isLikedProduct($params);
                if (!$check){
                    $_SESSION['user']['user_liked_products'] = $this->model->likeProduct($params);
                }
                else{
                    $_SESSION['user']['user_liked_products'] = $this->model->dislikeProduct($params);
                }
                header('location: https://fitwear/product/index/' . $product_link);
            }
            else{
                header('location: https://fitwear/404');
            }
        }
        else{
            $_SESSION['message'] = [
                'type' => 'warning',
                'text' => 'Необхідно увійти в обліковий запис для додавання товару в розділ "Вподобання"!'
            ];
            header('location: https://fitwear/user/login');
        }
    }
    function action_add_comment(){
        session_start();
        if (isset($_SESSION['user'])){
            if (!empty($this->params) && !empty($_POST)) {
                $product_link = $this->model->getProdByID($this->params)['product_link'];
                $data = [
                    'comment_status' => 'send',
                    'comment_user_id' => $_SESSION['user']['user_id'],
                    'comment_product_id' => $this->params,
                    'comment_description' => $_POST['description'],
                    'comment_time' => date('Y-m-d H:i:s'),
                    'comment_assessment' => $_POST['rate']
                ];
                $res = $this->model->addComment($data);
                if ($res){
                    $_SESSION['message'] = [
                        'type' => 'success',
                        'text' => 'Відгук надіслано!'
                    ];
                }
                header('location: https://fitwear/product/index/' . $product_link);
            }
        }
        else{
            $_SESSION['message'] = [
                'type' => 'warning',
                'text' => 'Необхідно увійти в обліковий запис для надсилання відгуків!'
            ];
            header('location: https://fitwear/user/login');
        }
    }
    function action_add(){
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2){
            $data['collections'] = $this->model->getCollections();
            $data['categories'] = $this->model->getCategories();
            $data['brands'] = $this->model->getBrands();
            $this->view->generate('admin/product.php', 'layouts/template_view.php', 'Додавання товару', $data);
        }
        else
            header('location: https://fitwear/user/login');
    }
    function action_edit(){
        if (!empty($this->params)){
            $data['product'] = $this->model->GetProd(explode('/',$this->params)[0]);
            if ($data['product']['product_collection_id'] != null){
                $data['collection'] = $this->model->getCollection($data['product']['product_collection_id']);
            }
            $data['rec_products'] = $this->model->GetOtherProds($this->params);
            $this->view->generate('product/edit.php', 'layouts/template_view.php', $data['product']['product_category_type_ua'].' '.$data['product']['product_brand'].' '.$data['product']['product_name'], $data);
        }
    }
    function action_update(){
        session_start();
        if (!empty($this->params)){
            if (isset($_SESSION['user']) && $_SESSION['user']['user_role_ability'] == 2 && !empty($_POST)){
                $data['product'] = $this->model->GetProd(explode('/',$this->params)[0]);
                $sizes = explode(', ', $data['product']['product_sizes']);
                $new_sizes = '';
                foreach ($sizes as $size){
                    $s = explode('-', $size)[0];
                    $new_sizes .= $s . '-' . $_POST['size' . $s] . ', ';
                }
                $new_sizes = substr($new_sizes, 0, -2);
                $params = [
                    'product_sizes' => $new_sizes,
                    'product_price' => $_POST['price'],
                    'product_discount' => $_POST['discount'],
                    'product_id' => $data['product']['product_id']
                ];
                $this->model->updateProduct($params);
                header('location: https://fitwear/product/edit/' . explode('/',$this->params)[0]);
            }
        }
    }
    function action_search(){

    }
}