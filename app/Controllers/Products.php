<?php

namespace App\Controllers;
use App\Models\MainModel;

class Products extends BaseController
{
    public function __construct(){
        $this->MainModel = new MainModel();
    }


    public function getIndex($product_type_id = null)
    {
        if(is_null($product_type_id)){            
            $data['products'] = $this->MainModel->getProducts();

            echo view("templates/header", ['title' => 'Produkte', 'description' => 'Anzeige aller Produkte']);
            echo view("pages/products", $data);
            echo view("templates/footer");
        }else{
            $data['product'] = $this->MainModel->getProduct($product_type_id);
            $data['product_ingredients'] = $this->MainModel->getProductIngredients($product_type_id);
                
            echo view("templates/header", ['title' => 'Produkte', 'description' => 'Anzeige aller Produkte']);
            echo view("pages/product", $data);
            echo view("templates/footer");

        }
        
    }

    public function postUpdate($product_type_id){
        $data=[];
        if($this->validation->run($_POST, 'product')){
            //echo "Richtig!";
            $_POST['product_type_id'] = $product_type_id;
            $this->MainModel->updateProduct($_POST);
        }else{
            $data['errors'] = $this->validation->getErrors();
        }

        //var_dump($_POST);

        $data['product'] = $this->MainModel->getProduct($product_type_id);
        $data['product_ingredients'] = $this->MainModel->getProductIngredients($product_type_id);
                
        echo view("templates/header", ['title' => 'Produkte', 'description' => 'Anzeige aller Produkte']);
        echo view("pages/product", $data);
        echo view("templates/footer");

    }

    public function postUpdateingredient($product_type_id){
        if ($this->validation->run($_POST, 'ingredient')) {
            $_POST['product_type_id'] = $product_type_id;
            $this->MainModel->updateIngredient($_POST);
        } else {
            // Fehlermeldungen generieren
            $data['error'] = $this->validation->getErrors();
        }

        $data['product'] = $this->MainModel->getProduct($product_type_id);
        $data['product_ingredients'] = $this->MainModel->getProductIngredients($product_type_id);
                
        echo view("templates/header", ['title' => 'Produkte', 'description' => 'Anzeige aller Produkte']);
        echo view("pages/product", $data);
        echo view("templates/footer");
    }



}
