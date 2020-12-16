<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Login {

    private $id;
    private $firstname;
    private $email;
    private $password;

    public static function findDataUser($email, $password) {

        $tableName = 'users';

        $pdo = Database::getPDO();

        $sql = "SELECT * 
                FROM `{$tableName}`
                WHERE email = :email
                AND password = :password";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':email', $email);
        $pdoStatement->bindParam(':password', $password);

        $pdoStatement->execute();
        return $pdoStatement->fetchObject(self::class);
    }

    public static function findByEmail($email) {

        $tableName = 'users';

        $sql = "SELECT * 
                FROM `{$tableName}` 
                WHERE email = :email";

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':email', $email);

        $pdoStatement->execute();
        return $pdoStatement->fetchObject(self::class);
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }









}