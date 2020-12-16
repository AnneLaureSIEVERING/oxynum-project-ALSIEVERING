<template>
    <section class="row justify-content-center border p-3 mt-5">
        <div class="col-md-4 col-lg-6 mt-5">
            <img src="../assets/images/pexels-tirelire.jpg" alt="tirelire" class="img-fluid">
        </div>
        <div class="col-12 col-md-8 col-lg-6">
            <h1 class="mt-5 mb-5 text-center fs-2">Ajouter un revenu</h1>
            <form v-on:submit.prevent="checkForm">
                <div class="input-group mb-4">
                    <label for="newIncome" class="form-label pe-3">Montant :</label>
                    <input type="text" class="form-control" id="newIncome" v-model="amount">
                    <span class="input-group-text" id="basic-addon2">€</span>
                </div>
                <div class="mb-4">
                    <select class="form-select" aria-label="month" v-model="month">
                        <option selected>Mois</option>
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
                <div class="mb-4">
                    <select class="form-select" aria-label="year" v-model="year">
                        <option selected>Année</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
                <div class="alert-error">
                     <ul class="error-list" v-if="errorList.length > 0">
                        <li v-for="error in errorList" v-bind:key="error.id">{{ error.message }}</li>
                    </ul>
                </div>
                <div class=" mb-5 text-center">
                    <button type="submit" class="btn btn-info btn-lg text-light">Ajouter</button>
                </div>
            </form>
        </div>
    </section>
    
</template>

<script>

import ApiClient from '../services/ApiClient'

export default {

    data: function() {
        return {
            month: "",
            year: "",
            amount: "",
            user_id:"",
            errorList: []
        }
    },
    mounted() {
        if (localStorage.getItem('user')) {
            this.user_id = localStorage.getItem('user');
        }
    },
    methods: {
        checkForm() {
            console.log('month', this.month);
            console.log('year', this.year);
            console.log('amount', this.amount);
            console.log(this.user_id);

            this.errorList = [];

            if (this.amount.length < 1) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Veuillez renseigner un montant"
                });
            }

            if (this.month.length < 1) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Vous n'avez pas indiqué le mois"
                });
            }
            if (this.year.length < 1) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Vous n'avez pas indiqué l'année"
                });
            }

            if (this.errorList.length === 0) {
                ApiClient.post('/income/add', {
                    month: this.month,
                    year: this.year,
                    amount: this.amount,
                    user_id: this.user_id
                })
                .then((response) => {
                    console.log(response);
                    if (response.request.status == 200) {
                        this.$router.push({name: 'incomesList'});
                    } else {
                        console.log('erreur coté api');
                    }
                })
            }
        }
    }    
};
</script>

<style lang="scss" scoped>
    .error-list {
        color: red;
        list-style: none;
        text-align: left;
    }
</style>