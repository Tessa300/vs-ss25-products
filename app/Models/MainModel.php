<?php

namespace APP\Models;
use CodeIgniter\Model;

class MainModel extends Model{

    public function getProducts(){
        $query = $this->db->query("SELECT product_types.*, GROUP_CONCAT(p2.name SEPARATOR ',') as ingredients, SUM(batches.in_stock) as in_stock 
            FROM `product_types` 
            left join ingredients on ingredients.product_type_id_parent = product_types.product_type_id 
            left join product_types as p2 on p2.product_type_id = ingredients.product_type_id_sub 
            left join batches on batches.product_type_id = product_types.product_type_id 
            WHERE expiration_date > NOW() OR expiration_date is null 
            group by product_types.product_type_id 
            order by product_types.name;");
        return $query->getResultArray();
    }

}

