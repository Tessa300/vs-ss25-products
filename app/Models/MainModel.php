<?php

namespace APP\Models;
use CodeIgniter\Model;

class MainModel extends Model{

    public function getProducts(){
        $query = $this->db->query("Select * from product_types");
        return $query->getResultArray();
    }

}

