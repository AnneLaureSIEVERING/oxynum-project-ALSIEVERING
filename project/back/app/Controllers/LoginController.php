<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController {

    public static function signIn() {

        $_POST = json_decode(file_get_contents('php://input'), true);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(isset($email) && isset($password)) {

            $loginUser = new Login();
            $userData = $loginUser->findByEmail($email);

            if ($userData) {

                global $router;

                if (password_verify($password,  $userData->getPassword())) {
                   
                    $_SESSION['firstname'] =  $userData->getFirstname();
                    $_SESSION['userId'] =  $userData->getId();

                    $result = [
                        "firstname" => $_SESSION['firstname'],
                        "user" => $_SESSION['userId']
                    ];

                    echo json_encode($result);

                } else {
                    echo "Email ou mot de passe invalide";
                    return http_response_code(400);
                }
            } else {
                echo "Email ou mot de passe invalide";
                return http_response_code(400); 
            }
        } 
    }

    public function logout() {

        unset($_SESSION['firstname']);
        unset($_SESSION['userId']);
    }
}