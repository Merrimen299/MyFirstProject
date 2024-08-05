<?php

namespace application\models;

class model_main extends \application\core\Model
{
    function getProducts($params = []){
        $sql = "SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, `product_images` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id`";
        if (!empty($params)){
            $count = 0;
            $filter = 'rec';
            $price_min = -1;
            $price_max = -1;
            $sql .= ' AND ';
            foreach ($params as $key => $value){
                $count += 1;
                if ($key == 'category'){
                    if ($value != null){
                        $sql .= '(`category`.`category_type_en` = ' . "\"" .$value . "\"" . ' OR `category`.`category_name` = ' . "\"" .$value . "\"" . ')' . ($count == count($params) ? '' : ' AND ');
                    }
                    continue;
                }elseif ($key == 'f'){
                    $filter = $value;
                    continue;
                }elseif ($key == 'price_min'){
                    $price_min = $value;
                    continue;
                }elseif ($key == 'price_max'){
                    $price_max = $value;
                    continue;
                }
                $sql .= '`products`.`product_' . $key . '` = ' . "\"" .$value . "\"" .($count == count($params) ? ' ' : ' AND ');
            }
            $sql .= ($price_min == -1 ? ' ' : ' AND `products.product_price` > ' . $price_min) .
                ($price_max == -1 ? ' ' : ' AND `products.product_price` < ' . $price_max);

        }
        $result = $this->db->row($sql);
        foreach ($result as $item){
            if ($item['product_type'] == 0){
                $item['product_type'] = 'clothes';
            }elseif ($item['product_type'] == 1){
                $item['product_type'] = 'shoes';
            }elseif ($item['product_type'] == 2){
                $item['product_type'] = 'accessories';
            }
        }
        return $result;
    }

    function getCountProducts($params = []){
        $sql = "SELECT COUNT(*) AS `count` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id`";
        if (!empty($params)) {
            $count = 0;
            $price_min = -1;
            $price_max = -1;
            $sql .= ' AND ';
            foreach ($params as $key => $value) {
                $count += 1;
                if ($key == 'category') {
                    if ($value != null){
                        $sql .= '(`category`.`category_type_en` = ' . "\"" .$value . "\"" . ' OR `category`.`category_name` = ' . "\"" .$value . "\"" . ')' . ($count == count($params) ? '' : ' AND ');
                    }
                    continue;
                } elseif ($key == 'price_min') {
                    $price_min = $value;
                    continue;
                } elseif ($key == 'price_max') {
                    $price_max = $value;
                    continue;
                }
                $sql .= '`products`.`product_' . $key . '` = ' . "\"" . $value . "\"" . ($count == count($params) ? ' ' : ' AND ');
            }
            $sql .= ($price_min == -1 ? ' ' : ' AND `products.product_price` > ' . $price_min) .
                ($price_max == -1 ? ' ' : ' AND `products.product_price` < ' . $price_max);
        }
        $result = $this->db->column($sql);
        return $result;
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
    function getMinAndMaxPrices(){
        $result = $this->db->column("SELECT MIN(`product_price`) AS `min`, MAX(`product_price`) AS `max` FROM products");
        return $result;
    }
    function searchProduct($query){
        $sql = "SELECT `product_id`, `product_name`, `product_gender`, `product_sizes`, `product_price`, `product_discount`, `product_description`, `product_season`, `product_articul`, `product_color`, `product_maker`, `product_content`, `product_type`, `brands`.`brand_name` AS `product_brand`, `product_collection_id`, `category`.`category_name` AS `product_category_name`, `category`.`category_gender` AS `product_category_gender`, `category`.`category_type_en` AS `product_category_type`, `category`.`category_type_ua` AS `product_category_type_ua`, `product_likes`, `product_avaliability`, `product_blocked_status`, `product_link`, `product_new`, `product_add_date`, `product_main_image`, `product_images` FROM `products`, `category`, `brands` WHERE `products`.`product_category_id` = `category`.`category_id` AND `products`.`product_brand_id` = `brands`.`brand_id` `products`.`product_link` LIKE '%$query%'";
        return $result = $this->db->row($sql);
    }

}