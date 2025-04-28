<?php

namespace App\Controllers;
use App\Models\MainModel;

class Products extends BaseController
{
    public function __construct(){
        $this->MainModel = new MainModel();
    }


    public function getIndex()
    {
        $data['products'] = $this->MainModel->getProducts();
        $data['info'] = "Hallo bin die Tessa";
        //echo "Hallo";
        return view('pages/products', $data);
    }
}
