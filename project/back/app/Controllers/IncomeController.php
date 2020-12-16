<?php

namespace App\Controllers;

use App\Models\Income;

class IncomeController {

    public function list() {

        $user_id = $_SESSION ["userId"];

        $incomes = new Income;
        $result = $incomes->findAll($user_id);

        echo json_encode($result);
    }

    public function month() {

        $user_id = $_SESSION ["userId"];
        $_POST = json_decode(file_get_contents('php://input'), true);
        $month = $_POST['month'];

        $incomes = new Income;
        $result = $incomes->totalAmountByMonth($month, $user_id);

        echo json_encode($result);
    }

    public function year() {

        $user_id = $_SESSION ["userId"];
        $_POST = json_decode(file_get_contents('php://input'), true);
        $year = $_POST['year'];

        $incomes = new Income;
        $result = $incomes->totalAmountByYear($year, $user_id);

        echo json_encode($result);
    }

    public function create() {

        $user_id = $_SESSION ["userId"];
        $_POST = json_decode(file_get_contents('php://input'), true);

        $month = $_POST['month'];
        $year = $_POST['year'];
        $amount = $_POST['amount'];

        if (empty($month)) {
            http_response_code(400);
        }
        if (empty($year)) {
            http_response_code(400);
        }
        if (empty($amount)) {
            http_response_code(400);
        } else {
            http_response_code(200);
        }

        $income = new Income;
        $income->setMonth($month);
        $income->setYear($year);
        $income->setAmount($amount);
        $income->setUser_id($user_id);

        $newIncome = $income->insert($month, $year, $amount, $user_id);

        if($newIncome){
            return http_response_code(200);
        } else {
            http_response_code(400);
        }   
    }

    public function update($params) {

        $id = $params["income_id"];

        $_POST = json_decode(file_get_contents('php://input'), true);

        $month = $_POST['month'];
        $year = $_POST['year'];
        $amount = $_POST['amount'];

        if (empty($month)) {
            echo"le mois est manquant";
            http_response_code(400);
        }
        if (empty($year)) {
            echo"l'année est manquante";
            http_response_code(400);
        }
        if (empty($amount)) {
            echo"le montant n'est pas renseigné";
            http_response_code(400);
        }

        $incomeUpdate = new Income;
        $incomeUpdate->setMonth($month);
        $incomeUpdate->setYear($year);
        $incomeUpdate->setAmount($amount);

        $updateIncome = $incomeUpdate->update($id, $month, $year, $amount);

        if($updateIncome){
            return http_response_code(200);
        } else {
            http_response_code(400);
        }
    }

    public function delete($params) {

        $id = $params["income_id"];

        $incomeDelete = new Income;
        $delete = $incomeDelete->delete($id);

        if($delete){
            return http_response_code(200);
        } else {
            http_response_code(400);
        }

    }

}