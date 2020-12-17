<?php

namespace App\Controllers;

use App\Models\Register;

class RegisterController {

    public function signUp() {

        $_POST = json_decode(file_get_contents('php://input'), true);

        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(isset($firstname) && isset($email) && isset($password)){

            $users = new Register();

            $users->setFirstname($firstname);
            $users->setEmail($email);
            $users->setPassword($password);

            $newUser = $users->registerUser($firstname, $email, $password);

            return http_response_code(200);
            
        } else {
            echo"Certaines données sont manquantes";
            return http_response_code(400);

        }
    }
}