<?php

namespace application\models;

class Model_Admin extends \application\core\Model
{
    function getComments(){
        $result['send'] = $this->db->row("SELECT `comment_id`, `comment_status`, `comment_description`, `comment_user_id`, `comment_product_id`, `comment_time`, `comment_assessment`, users.`user_email` AS `user_email`, users.`user_middlename` AS `user_middlename`, products.product_name AS `product_name`, products.product_link AS `product_link`, brands.brand_name AS `brand_name`, category.category_type_ua AS `category_type` FROM `comments`, `users`, `products`, brands, category WHERE comments.comment_user_id = users.user_id AND comments.comment_product_id = products.product_id AND `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND `comments`.`comment_status` = 'send'");
        $result['published'] = $this->db->row("SELECT `comment_id`, `comment_status`, `comment_description`, `comment_user_id`, `comment_product_id`, `comment_time`, `comment_assessment`, users.`user_email` AS `user_email`, users.`user_middlename` AS `user_middlename`, products.product_name AS `product_name`, products.product_link AS `product_link`, brands.brand_name AS `brand_name`, category.category_type_ua AS `category_type` FROM `comments`, `users`, `products`, brands, category WHERE comments.comment_user_id = users.user_id AND comments.comment_product_id = products.product_id AND `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND `comments`.`comment_status` = 'published'");
        $result['denied'] = $this->db->row("SELECT `comment_id`, `comment_status`, `comment_description`, `comment_user_id`, `comment_product_id`, `comment_time`, `comment_assessment`, users.`user_email` AS `user_email`, users.`user_middlename` AS `user_middlename`, products.product_name AS `product_name`, products.product_link AS `product_link`, brands.brand_name AS `brand_name`, category.category_type_ua AS `category_type` FROM `comments`, `users`, `products`, brands, category WHERE comments.comment_user_id = users.user_id AND comments.comment_product_id = products.product_id AND `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND `comments`.`comment_status` = 'denied'");
        $result['count']['send'] = $this->db->column("SELECT COUNT(*) AS `count` FROM `comments` WHERE `comment_status` = 'send'")['count'];
        $result['count']['published'] = $this->db->column("SELECT COUNT(*) AS `count` FROM `comments` WHERE `comment_status` = 'published'")['count'];
        $result['count']['denied'] = $this->db->column("SELECT COUNT(*) AS `count` FROM `comments` WHERE `comment_status` = 'denied'")['count'];
        return $result;
    }
    function getOrders(){
        $res['new'] = $this->db->row("SELECT orders.*, users.user_firstname, users.user_middlename, users.user_lastname, users.user_adress FROM `orders`, users WHERE order_user_id = users.user_id AND `orders`.`order_status` = 'Замовлення створено'");
        $res['received'] = $this->db->row("SELECT orders.*, users.user_firstname, users.user_middlename, users.user_lastname, users.user_adress FROM `orders`, users WHERE order_user_id = users.user_id AND `orders`.`order_status` = 'Замовлення отримано'");
        $res['denied'] = $this->db->row("SELECT orders.*, users.user_firstname, users.user_middlename, users.user_lastname, users.user_adress FROM `orders`, users WHERE order_user_id = users.user_id AND `orders`.`order_status` = 'Замовлення скасовано'");
        $res['accepted'] = $this->db->row("SELECT orders.*, users.user_firstname, users.user_middlename, users.user_lastname, users.user_adress FROM `orders`, users WHERE order_user_id = users.user_id AND `orders`.`order_status` = 'Замовлення прийнято'");
        $res['delivered'] = $this->db->row("SELECT orders.*, users.user_firstname, users.user_middlename, users.user_lastname, users.user_adress FROM `orders`, users WHERE order_user_id = users.user_id AND `orders`.`order_status` = 'Замовлення відправлено'");
        $res['ready'] = $this->db->row("SELECT orders.*, users.user_firstname, users.user_middlename, users.user_lastname, users.user_adress FROM `orders`, users WHERE order_user_id = users.user_id AND `orders`.`order_status` = 'Замовлення в очікуванні'");
       return $res;
    }
    function getOrderProduct($id){
        $result = $this->db->column("SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND product_id = '$id'");
        return $result;
    }
    function getUsers($id){
        $result = $this->db->row("SELECT * FROM `users` WHERE NOT user_id = '$id'");
        return $result;
    }
    function getOrdersByYear($year){
        $nyear = $year + 1;
        $res = $this->db->row("SELECT orders.*, users.user_firstname, users.user_middlename, users.user_lastname, users.user_adress FROM `orders`, users WHERE order_user_id = users.user_id AND `orders`.`order_time` >='" . $year ."-01-01' AND `orders`.`order_time` < '" . $nyear ."-01-01'");
        return $res;
    }
    function setCommentStatus($params){
        $this->db->query("UPDATE `comments` SET `comment_status`= :comment_status, `comment_time`= :comment_time WHERE `comment_id`= :comment_id", $params);
        return true;
    }
    function setOrderStatus($params){
        $this->db->query("UPDATE `orders` SET `order_status`= :order_status, `order_time`= :order_time WHERE `order_id`= :order_id", $params);
        return true;
    }

}