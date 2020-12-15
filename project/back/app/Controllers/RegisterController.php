<?php

namespace App\Controllers;

use App\Models\Register;

class RegisterController {

    public function signUp() {

        $_POST = json_decode(file_get_contents('php://input'), true);

        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $confirmEmail = $_POST['checkEmail'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['checkPassword'];

        if (empty($firstname)) {
            http_response_code(400);
        }
        if (empty($email)) {
            http_response_code(400);
        }
        if (empty($confirmEmail)) {
            http_response_code(400);
        }
        if (empty($password)) {
            http_response_code(400);
        }
        if (empty($confirmPassword)) {
            http_response_code(400);
        } else {
            http_response_code(200);
        }


        if($email == $confirmEmail && $password == $confirmPassword){

            $users = new Register();

            $users->setFirstname($firstname);
            $users->setEmail($email);
            $users->setPassword($password);

            $newUser = $users->registerUser($firstname, $email, $password);

            return http_response_code(200);
            
        } else {
            http_response_code(400);

        }
    }
}