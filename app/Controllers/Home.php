<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
            $seo = ['title' => 'Login', 'description' => 'Login'];
            echo view("templates/header", $seo);
            echo view("pages/login");
            echo view("templates/footer");
    }
}
