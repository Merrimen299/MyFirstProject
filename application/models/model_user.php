<?php
namespace application\models;

use application\core\Model;

class Model_User extends Model
{

    public function isRegistered($login){
        if ($this->db->column("SELECT COUNT(*) as `count` FROM `users` WHERE `user_email` = '$login'")['count'] == 1){
            return true;
        }
        return false;
    }

    public function Register($params)
    {
        $this->db->query("INSERT INTO `users`(`user_email`, `user_password`, `user_role_ability`, `user_firstname`, `user_middlename`, `user_lastname`, `user_register_date`) 
        VALUES (
                :user_email,
                :user_password,
                :user_role_ability,
                :user_firstname,
                :user_middlename,
                :user_lastname,
                :user_register_date
        )",
            $params);
        return true;
    }

    public function Login($login, $pass){
        $params = [
            'login' => $login,
            'password' => $pass
        ];
        $user = $this->db->column("SELECT * FROM `users` WHERE `user_email` = :login AND `user_password` = :password", $params);
        if ($this->db->column("SELECT COUNT(*) FROM `users` WHERE `user_email` = :login AND `user_password` = :password", $params) == 0)
            return false;
        return $user;
    }


    function updateUser($data){
        $this->db->query("UPDATE `users` SET `user_firstname` = :user_firstname, `user_middlename` = :user_middlename, `user_lastname` = :user_lastname, `user_adress` = :user_adress, `user_birthday`= :user_birthday, `user_phone_number` = :user_phone_number WHERE `user_id` = :user_id", $data);
        return true;
    }
    function updateUserPassword($data){
        $this->db->query("UPDATE `users` SET `user_password` = :user_password WHERE `user_id` = :user_id", $data);
        return true;
    }
    function getLiked($data){
        if ($data != ''){
            $id = substr($data, 0, -1);
            $id = explode(',', $id);
            $sql = "SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, `product_images` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND ";
            $c = 0;
            $sql .= '(';
            foreach ($id as $item){
                $sql .= "product_id = '$item'" . ($c != count($id) - 1 ? ' OR ' : '');
                $c++;
            }
            $sql .= ')';
            return $this->db->row($sql);
        }
        else
            return null;
    }
    function getUserOrders($id){
        $res = $this->db->row("SELECT * FROM `orders` WHERE `order_user_id` = '$id'");
        return $res;
    }
    function getOrderProduct($id){
        $result = $this->db->column("SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND product_id = '$id'");
        return $result;
    }
    function getClubCard($id){
        $result = $this->db->column("SELECT `club cards`.*, `users`.`user_firstname`, `users`.`user_middlename`, `users`.`user_lastname` FROM `club cards`, `users` WHERE `users`.`user_club_card_id` = `club cards`.`club_card_id` AND `users`.`user_id` = '$id'");
        return $result;
    }
}
