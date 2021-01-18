<template>
    <!-- calculation of income obtained over a period -->
    <section class="row justify-content-center border p-3 mt-5" >
        <div class="col-md-9 col-lg-6 mt-5">
            <img src="../assets/images/money.png" alt="gestion" class="img-fluid">
        </div>
        <div class="mt-5 mb-3 text-center col-12 col-md-8 col-lg-6">
            <h1 class="fs-1">Mes revenus</h1>
            <h2 class="fs-4 mt-5">Vous souhaitez savoir combien vous avez gagné ?</h2>
             
        <div class="row justify-content-center align-items-center mt-5">
            <SelectMonth v-model="month"></SelectMonth>
            <ButtonIncomeByMonth v-on:click="monthMethod"></ButtonIncomeByMonth>
        </div>
            
        <div class="row justify-content-center align-items-center mt-5">
            <SelectYear v-model="year"></SelectYear>
            <ButtonIncomeByYear v-on:click="yearMethod"></ButtonIncomeByYear>
        </div>
            
        <p class="text-center fs-4 mt-5">Sur cette période, j'ai gagné : {{incomeSum}}</p>
        </div>
    </section>   
</template>

<script>
import ApiClient from '../services/ApiClient';
import ButtonIncomeByMonth from "./atomes/buttons/ButtonIncomeByMonth";
import ButtonIncomeByYear from './atomes/buttons/ButtonIncomeByYear';
import SelectMonth from './molécules/SelectMonth';
import SelectYear from './molécules/SelectYear';

export default {
    components: {
        ButtonIncomeByMonth,
        ButtonIncomeByYear,
        SelectMonth,
        SelectYear
    },
    data() {
        return {
            month:"",
            year:"",
            incomeSum:"",
            user_id: ""
        }
    },
    mounted() {
        if (localStorage.getItem('user')) {
            this.user_id = localStorage.getItem('user');
        }
    },
     methods: {
        monthMethod() {
            ApiClient.post('/incomes/month', {
                month: this.month,
                user_id: this.user_id
            })
            .then((response) => {
                this.incomeSum = response.data["SUM(amount)"];
            });
        },
        yearMethod() {
            ApiClient.post('/incomes/year', {
                year: this.year,
                user_id: this.user_id
            })
            .then((response) => {
                this.incomeSum = response.data["SUM(amount)"];
            });
        }
    }
}
</script>