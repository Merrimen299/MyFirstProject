<?php

namespace application\models;

use application\core\Model;

class Model_Product extends Model
{

    function GetProd($link){
        $params = [
            'product_link' => $link
        ];
        $result = $this->db->column("SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, `product_images` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND product_link = :product_link", $params);
        return $result;
    }
    function getProdByID($id){
        $result = $this->db->column("SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, `product_images` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND product_id = '$id'");
        return $result;
    }
    function getCollection($id){
        $params = [
            'collection_id' => $id
        ];
        $res = $this->db->column("SELECT * FROM collections WHERE collection_id = :collection_id", $params);
        return $res;
    }
    function GetOtherProds($link){
        $params = [
            'product_link' => $link
        ];
        $result = $this->db->row("SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, `product_images` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` AND NOT product_link = :product_link LIMIT 4", $params);
        return $result;
    }
    function isLikedProduct($params){
        $prod = $params['product_id'];
        $user = $params['user_id'];
        $liked = $this->db->column("SELECT `user_liked_products` FROM users WHERE user_id = '$user'")['user_liked_products'];
        $liked = substr($liked, 0, -1);
        $liked = explode(',', $liked);
        foreach ($liked as $item){
            if ($item == $prod){
                return true;
            }
        }
        return false;
    }
    function likeProduct($params){
        $prod = $params['product_id'];
        $user = $params['user_id'];
        $liked = $this->db->column("SELECT `user_liked_products` FROM `users` WHERE `user_id` = '$user'")['user_liked_products'];
        $liked = substr($liked, 0, -1);
        $liked .= $liked == '' ? ($prod . ',') : (',' . $prod . ',');
        $this->db->query("UPDATE `users` SET `user_liked_products` = '$liked' WHERE `user_id` = '$user'");
        $prodLikes = $this->db->column("SELECT `product_likes` FROM `products` WHERE `product_id` = '$prod'")['product_likes'];
        $prodLikes += 1;
        $this->db->query("UPDATE `products` SET `product_likes` = '$prodLikes' WHERE `product_id` = '$prod'");
        return $liked;
    }
    function dislikeProduct($params){
        $prod = $params['product_id'];
        $user = $params['user_id'];
        $liked = $this->db->column("SELECT `user_liked_products` FROM `users` WHERE `user_id` = '$user'")['user_liked_products'];
        $liked = explode(',', $liked);
        $new_liked = '';
        foreach ($liked as $item){
            if ($item == $prod){
                continue;
            }
            else{
                $new_liked .= $item . ',';
            }
        }
        $new_liked = substr($new_liked, 0, -1);
        $this->db->query("UPDATE `users` SET `user_liked_products` = '$new_liked' WHERE `user_id` = '$user'");
        $prodLikes = $this->db->column("SELECT `product_likes` FROM `products` WHERE `product_id` = '$prod'")['product_likes'];
        $prodLikes -= 1;
        $this->db->query("UPDATE `products` SET `product_likes` = '$prodLikes' WHERE `product_id` = '$prod'");
        return $new_liked;
    }
    function addComment($params){
        $this->db->query("INSERT INTO `comments`(`comment_status`, `comment_description`, `comment_user_id`, `comment_product_id`, `comment_assessment`, `comment_time`) 
        VALUES (
                :comment_status,
                :comment_description,
                :comment_user_id,
                :comment_product_id,
                :comment_assessment,
                :comment_time
        )",
            $params);
        return true;
    }
    function getBrands(){
        $result = $this->db->row("SELECT * FROM brands");
        return $result;
    }
    function getCategories(){
        $result = [];
        $shoes = $this->db->row("SELECT DISTINCT category_type_ua, category_type_en FROM `category` WHERE category_name = 'shoes'");
        $clothes = $this->db->row("SELECT DISTINCT category_type_ua, category_type_en FROM `category` WHERE category_name = 'clothes'");
        $accessories = $this->db->row("SELECT DISTINCT category_type_ua, category_type_en FROM `category` WHERE category_name = 'accessories'");
        array_push($result, $shoes, $clothes, $accessories);
        return $result;
    }
    function getCollections(){
        $res = $this->db->row("SELECT * FROM collections");
        return $res;
    }
    function updateProduct($params){
        $this->db->query("UPDATE `products` SET `product_sizes` = :product_sizes ,`product_price`= :product_price ,`product_discount`= :product_discount WHERE `product_id` = :product_id", $params);
        return true;
    }
}