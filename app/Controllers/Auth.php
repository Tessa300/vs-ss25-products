<?php

namespace App\Controllers;

class Auth extends BaseController
{

    private $idp_url = "https://idp-dhbw.beultemo.de/index.php";

    public function postLogin(){
        $curl = curl_init($this->idp_url. "/auth/login");
        $payload = json_encode([
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        ]);

        // Return as string and not auto outputting
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Define POST data
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        ]);
        // Optional: nur bei Problemen mit SSL-Zertifikaten
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode === 200 && $response !== false) {
            $data = json_decode($response, true);
            session()->set('token', $data['token']);
            return redirect()->to(site_url('products'));
        }else{
            return redirect()->to(site_url('/'));
        }
    }

    public function getLogout(){
        session()->remove('token');
        return redirect()->to(site_url('/'));
    }


    public function getUsers(){
        $curl = curl_init($this->idp_url. "/users");
        // Return as string and not auto outputting
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // SSL certificate not available (localhost)
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . session()->token
        ]);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        if ($httpCode === 200 && $response !== false) {
            $users = json_decode($response, true);
            // Do something with data
            var_dump($users);
        }else{
            echo "Fehler";
        }
    }



}
