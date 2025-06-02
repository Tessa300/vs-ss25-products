<?php

namespace App\Controllers;
use App\Models\MainModel;

class Products extends BaseController
{
    public function __construct(){
        $this->MainModel = new MainModel();
    }

    private function returnView($product_type_id = null, $data = []){
        if(is_null($product_type_id)) {
            $data['products'] = $this->MainModel->getProducts();

            echo view("templates/header", ['title' => 'Produkte', 'description' => 'Anzeige aller Produkte']);
            echo view("pages/products", $data);
            echo view("templates/footer");
        }else{
            $seo = ['title' => 'Produkt', 'description' => 'Hinzufügen eines neuen Produkts'];
            if($product_type_id != 'new') {
                $data['product'] = $this->MainModel->getProduct($product_type_id);
                $data['product_ingredients'] = $this->MainModel->getProductIngredients($product_type_id);
                $seo['description'] = 'Anzeige des Produkts '.$data['product']['name'];
            }
            $data['unit_symbols'] = ['kg', 'l', 'Stk.', 'Port.']; // 
            $data['ingredients'] = $this->MainModel->getIngredients();

            echo view("templates/header", $seo);
            echo view("pages/product", $data);
            echo view("templates/footer");
        }
    }    

    public function getIndex($product_type_id = null){
        if(!session()->has('token')){
            return redirect()->to(site_url('/'));
        }

        $this->returnView($product_type_id);
    }

    public function postUpdate($product_type_id){
        if ($this->validation->run($_POST, 'product')) {
            $_POST['product_type_id'] = $product_type_id;
            $this->MainModel->updateProduct($_POST);
            return redirect()->to(site_url('products/'.$product_type_id));
        } else {
            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();
            $this->returnView($product_type_id, $data);
        }
    }

    public function postUpdateingredient($product_type_id){
        if ($this->validation->run($_POST, 'ingredient')) {
            $_POST['product_type_id'] = $product_type_id;
            $this->MainModel->updateIngredient($_POST);
            return redirect()->to(site_url('products/'.$product_type_id));
        } else {
            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();
            $this->returnView($product_type_id, $data);
        }
    }



}
