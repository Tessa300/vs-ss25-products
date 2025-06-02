<?php

namespace App\Controllers;
use App\Models\MainModel;
use CodeIgniter\HTTP\ResponseInterface;

class Api extends BaseController
{
    
    public function __construct(){
        $this->MainModel = new MainModel();

        $this->apiKey = "12345";
    }

    private function checkApikey($key){
        return $this->apiKey == $key;
    }

    private function getResponse($responseBody, $code = ResponseInterface::HTTP_OK){
        return $this->response->setStatusCode($code)->setJSON($responseBody);
    }

    public function getMenu($key){
        if($this->checkApikey($key)){
            $data['products'] = $this->MainModel->getMenu();
            return $this->getResponse($data);
        }else{
            // Key falsch
            return $this->getResponse(['error' => 'Invalid API Key'], ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }
}
