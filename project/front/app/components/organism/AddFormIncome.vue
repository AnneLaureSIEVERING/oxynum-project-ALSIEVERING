<template>
    <section class="row justify-content-center border p-3 mt-5">
        <div class="col-md-4 col-lg-6 mt-5">
            <img src="../../assets/images/pexels-tirelire.jpg" alt="tirelire" class="img-fluid">
        </div>
        <div class="col-12 col-md-8 col-lg-6">
            <h1 class="mt-5 mb-5 text-center fs-2">Ajouter un revenu</h1>
            <form v-on:submit.prevent="checkForm">
                <InputGroupForm v-model="amount"></InputGroupForm>
                <SelectMonth v-model="month" :monthList="monthList"></SelectMonth> <!-- TODO: y ajouter la fonction qui lui sera reliée -->
                <SelectYear v-model="year" :yearList="yearList"></SelectYear> <!-- TODO : y ajouter la fonction qui lui sera reliée -->
                <AlertError :errorList="errorList" v-if="errorList.length > 0"></AlertError>
                <ButtonAdd></ButtonAdd>
            </form>
        </div>
    </section>
</template>

<script>
import ApiClient from '../../services/ApiClient';
import AlertError from '../molecule/AlertError';
import ButtonAdd from '../atoms/buttons/ButtonAdd'
import SelectMonth from '../molecule/SelectMonth';
import SelectYear from '../molecule/SelectYear';
import InputGroupForm from '../molecule/InputGroupForm';

export default {
    components: {
        AlertError,
        ButtonAdd,
        SelectMonth,
        SelectYear,
        InputGroupForm
    },
    data: function() {
        return {
            month: "",
            year: "",
            amount: "",
            user_id:"",
            errorList: [],
            monthList: [],
            yearList: []
        }
    },
    mounted() {
        if (localStorage.getItem('user')) {
            this.user_id = localStorage.getItem('user');
        }
    },
    methods: {
        async checkForm() {
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
                let responseAPI = await ApiClient.post('/income/add', {
                    month: this.month,
                    year: this.year,
                    amount: this.amount,
                    user_id: this.user_id
                });
                console.log(responseAPI);
                    
                if (responseAPI.request.status == 200) {
                    this.$router.push({name: 'incomesList'});
                } else {
                    console.log('erreur coté api');
                }
            }
        }
    }    
};
</script>
