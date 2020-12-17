<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Register {

    private $id;
    private $firstname;
    private $email;
    private $password;
    
    public function registerUser($firstname, $email, $password) {

        $tableName = 'users';
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `{$tableName}` (firstname, email, password)
                VALUES (:firstname, :email, :hash)";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':firstname', $firstname);
        $pdoStatement->bindParam(':email', $email);
        $pdoStatement->bindParam(':hash', $hash);

        $pdoStatement->execute();
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }
}