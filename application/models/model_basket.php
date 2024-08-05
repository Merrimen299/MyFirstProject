<?php

namespace application\models;

use application\core\Model;

include "application/instruments/functions.php";



class Model_Basket extends Model{
    function getProduct($id = null){
        if ($id == null)
            return false;
        else{
            $sql = "SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`,
       `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`,
       `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` 
           AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` 
               AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, 
       `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, 
       `product_images` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` 
                                                                AND `products`.`product_brand_id` = `brands`.`brand_id` 
                                                                AND `products`.`product_id`= '$id'";
        return $this->db->column($sql);
        }
    }

}
