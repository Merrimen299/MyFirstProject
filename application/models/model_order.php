<?php

namespace application\models;

use application\core\Model;

class model_order extends Model
{
    function getOrder($id){
        $res = $this->db->column("SELECT * FROM `orders` WHERE `order_id` = '$id'");
        return $res;
    }
    function createOrder($params){
       $res = $this->db->query("INSERT INTO `orders`(`order_number`, `order_user_id`, `order_user_name`, `order_user_email`, `order_user_phone_num`, `order_products`, `order_sum`, `order_discount`, `order_type`, `order_adress`, `order_status`) 
VALUES (
        :order_number,
        :order_user_id,
        :order_user_name,
        :order_user_email,
        :order_user_phone_num,
        :order_products,
        :order_sum,
        :order_discount,
        :order_type,
        :order_adress,
        :order_status)", $params);
       return $res != false;
    }
    function updateProductCount($size, $id){
        $this->db->query("UPDATE `products` SET `product_sizes`='$size' WHERE `product_id` = '$id'");
        return true;
    }
    function getOrderProductSizes($id){
        $result = $this->db->column("SELECT `product_sizes` FROM `products` WHERE product_id = '$id'");
        return $result;
    }
    function deleteOrder($id){
        $this->db->query("DELETE FROM `orders` WHERE `order_id` = '$id'");
        return true;
    }
    function setOrderStatus($params){
        $this->db->query("UPDATE `orders` SET `order_status`= :order_status, `order_time`= :order_time WHERE `order_id`= :order_id", $params);
        return true;
    }

}