<template>
    <!-- calculation of income obtained over a period -->
    <section class="row justify-content-center border p-3 mt-5" >
        <div class="col-md-4 col-lg-6 mt-3">
            <img src="../assets/images/pexels-gestion.png" alt="gestion" class="img-fluid">
        </div>
        <div class="mt-5 mb-3 text-center col-12 col-md-8 col-lg-6">
            <h1 class="fs-1">Mes revenus</h1>
            <h2 class="fs-4 mt-5">Vous souhaitez savoir combien vous avez gagné ?</h2>
             
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-8 col-md-4 col-lg-5">
                <select class="form-select" aria-label="chooseMonth" v-model="month">
                    <option selected>Choisir le mois</option>
                    <option value="Janvier">Janvier</option>
                    <option value="Février">Février</option>
                    <option value="Mars">Mars</option>
                    <option value="Avril">Avril</option>
                    <option value="Mai">Mai</option>
                    <option value="Juin">Juin</option>
                    <option value="Juillet">Juillet</option>
                    <option value="Août">Août</option>
                    <option value="Septembre">Septembre</option>
                    <option value="Octobre">Octobre</option>
                    <option value="Novembre">Novembre</option>
                    <option value="Décembre">Décembre</option>
                </select>
            </div>
            <div class="col-4 col-md-2 col-lg-3">
                <button class="btn btn-info btn-lg text-light" type="submit" v-on:click="monthMethod">Calculer</button>
            </div>
        </div>
            
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-8 col-md-4 col-lg-5">
                <select class="form-select" aria-label="chooseYear" v-model="year">
                    <option selected>Choisir l'année</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="col-4 col-md-2 col-lg-3">
                <button class="btn btn-info btn-lg text-light" type="submit" v-on:click="yearMethod">Calculer</button>
            </div>
        </div>
            
        <p class="text-center fs-4 mt-5">J'ai gagné : {{incomeSum}} €</p>
        </div>
    </section>   
    
</template>

<script>
import ApiClient from '../services/ApiClient';

export default {
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

<style scoped>

</style>