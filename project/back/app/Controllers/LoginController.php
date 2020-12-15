<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController {

    public static function signIn() {

        echo"tu es bien sur le controller Login";

        $_POST = json_decode(file_get_contents('php://input'), true);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            http_response_code(400);
        }
        if (empty($password)) {
            http_response_code(400);
        }
        if(isset($email) && isset($password)) {

            $loginUser = new Login();
            $userData = $loginUser->findByEmail($email);

            if ($userData) {

                global $router;

                if (password_verify($password,  $userData->getPassword())) {
                   
                    $_SESSION['firstname'] =  $userData->getFirstname();
                    $_SESSION['userId'] =  $userData->getId();

                } else {
                    echo "Email ou mot de passe invalide";
                    http_response_code(400);
                }
            } else {
                echo "Email ou mot de passe invalide";
                http_response_code(400); 
            }
        } 
    }

    public function logout() {

        unset($_SESSION['firstname']);
    }
}