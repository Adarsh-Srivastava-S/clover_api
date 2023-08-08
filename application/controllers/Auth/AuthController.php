<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function index()
	{
        echo "Auth Controller";
    }

    public function token(){
        $jwt = new JWT();
        $JwtSecretKey = "Cloverleaf@123";
        $data = array(
            'id'=>145,
            'email'=>'adarsh@gmail.com',
            'userType'=>'admin',
        );

        $token = $jwt->encode($data,$JwtSecretKey,'HS256');
        echo $token;
    }

    public function decode_token()
    {
        $token = $this->uri->segment(4);
        $jwt = new JWT();
        $JwtSecretKey = "Cloverleaf@123";
        $decoded_token = $jwt->decode($token,$JwtSecretKey,'HS256');
        // this will return std_object
        // echo '<pre>';
        // print_r($decoded_token);
        // It will return json
        $token1 = $jwt->jsonEncode($decoded_token);
        echo $token1;
    }
}