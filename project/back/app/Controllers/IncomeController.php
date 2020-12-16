<?php

namespace App\Controllers;

use App\Models\Income;

class IncomeController {

    public function list() {
        
        $userId = $_SESSION["userId"];
        $_POST = json_decode(file_get_contents('php://input'), true);
        $user_id = intval($_POST['user_id']);

        $incomes = new Income;
        $result = $incomes->findAll($user_id);

        echo json_encode($result);
    }

    public function month() {

        //$userId = $_SESSION["userId"];
        $_POST = json_decode(file_get_contents('php://input'), true);

        $month = $_POST['month'];
        $user_id = intval($_POST['user_id']);

        $incomes = new Income;
        $result = $incomes->totalAmountByMonth($month, $user_id);

        echo json_encode($result);
    }

    public function year() {

        //$userId = $_SESSION["userId"];
        $_POST = json_decode(file_get_contents('php://input'), true);

        $year = intval($_POST['year']);
        $user_id = intval($_POST['user_id']);

        $incomes = new Income;
        $result = $incomes->totalAmountByYear($year, $user_id);

        echo json_encode($result);
    }

    public function create() {

        $user_id = $_SESSION['userId'];
        $_POST = json_decode(file_get_contents('php://input'), true);

        $month = $_POST['month'];
        $year = intval($_POST['year']);
        $amount = intval($_POST['amount']);
        $userId = intval($_POST['user_id']);

        $income = new Income;
        $income->setMonth($month);
        $income->setYear($year);
        $income->setAmount($amount);
        $income->setUser_id($user_id);

        $newIncome = $income->insert($month, $year, $amount, $userId);

        if($newIncome){
            return http_response_code(200);
        } else {
            echo"certaines données sont manquantes";
            return http_response_code(400);
        }   
    }

    public function update($params) {

        $id = $params["income_id"];

        $_POST = json_decode(file_get_contents('php://input'), true);

        $month = $_POST['month'];
        $year = intval($_POST['year']);
        $amount = intval($_POST['amount']);

        $incomeUpdate = new Income;
        $incomeUpdate->setMonth($month);
        $incomeUpdate->setYear($year);
        $incomeUpdate->setAmount($amount);

        $updateIncome = $incomeUpdate->update($id, $month, $year, $amount);

        if($updateIncome){
            return http_response_code(200);
        } else {
            echo"certaines données sont manquantes";
            return http_response_code(400);
        }
    }

    public function delete($params) {

        $id = $params["income_id"];

        $incomeDelete = new Income;
        $delete = $incomeDelete->delete($id);

        if($delete){
            return http_response_code(200);
        } else {
            echo"la suppression a échoué";
            return http_response_code(400);
        }

    }

}