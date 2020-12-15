<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Income {

    private $id;
    private $month;
    private $year;
    private $amount;
    private $user_id;

    // All incomes of a User
    public static function findAll($user_id) {

        $table = 'incomes';

        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `{$table}`
                WHERE user_id = :user_id ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':user_id', $user_id);

        $pdoStatement->execute();
        $data = $pdoStatement->fetchAll();

        return $data;
    }

    // Incomes by Month
    public static function totalAmountByMonth($month, $user_id) {

        $table = 'incomes';

        $pdo = Database::getPDO();

        $sql = "SELECT SUM(amount) FROM `{$table}` WHERE month=:month
                AND user_id= :user_id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':month', $month);
        $pdoStatement->bindParam(':user_id', $user_id);

        $pdoStatement->execute();
        $data = $pdoStatement->fetch();

        return $data;
    }

    // Incomes by Year 
    public static function totalAmountByYear($year, $user_id) {

        $table = 'incomes';

        $pdo = Database::getPDO();

        $sql = "SELECT SUM(amount) FROM `{$table}` WHERE year=:year
                AND user_id= :user_id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':year', $year);
        $pdoStatement->bindParam(':user_id', $user_id);

        $pdoStatement->execute();
        $data = $pdoStatement->fetch();

        return $data;
    }

    // Incomes manage
    public static function insert($month, $year, $amount, $user_id) {

        $table = 'incomes';

        $pdo = Database::getPDO();

        $sql = "INSERT INTO `{$table}` (`month`, `year`, amount, `user_id`)
                VALUES (:month, :year, :amount, :user_id)";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':month', $month);
        $pdoStatement->bindParam(':year', $year);
        $pdoStatement->bindParam(':amount', $amount);
        $pdoStatement->bindParam(':user_id', $user_id);

        $pdoStatement->execute();

        $insertedRows =$pdoStatement->rowCount();

        if ($insertedRows === 1) {
            return true;
        }
        return false;
    }

    public static function update($id, $month, $year, $amount){

        $table = 'incomes';
        $pdo = Database::getPDO();


        $sql = "UPDATE `{$table}` SET 
                month = :month, 
                year = :year, 
                amount = :amount
                WHERE id = :id ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':month', $month);
        $pdoStatement->bindParam(':year', $year);
        $pdoStatement->bindParam(':amount', $amount);
        $pdoStatement->bindParam(':id', $id);

        $pdoStatement->execute();

        $deletedRow = $pdoStatement->rowCount();
        return ($deletedRow > 0);  
    }

    public static function delete($id){

        $table = 'incomes';
        $pdo = Database::getPDO();


        $sql = "DELETE FROM `{$table}` WHERE id = :id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':id', $id);

        $pdoStatement->execute();

        $deletedRow = $pdoStatement->rowCount();
        return ($deletedRow > 0);  
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of month
     */ 
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set the value of month
     *
     * @return  self
     */ 
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}