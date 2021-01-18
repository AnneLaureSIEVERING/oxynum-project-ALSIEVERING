<template>
    <section class="row justify-content-center border p-3 mt-5">
        <div class="col-md-4 col-lg-6 mt-5">
            <img src="../assets/images/pexels-tirelire.jpg" alt="tirelire" class="img-fluid">
        </div>
        <div class="col-12 col-md-8 col-lg-6">
            <AddFormTitle></AddFormTitle>
            
            <form v-on:submit.prevent="checkForm">
                <InputGroupForm v-model="amount">></InputGroupForm>
                <SelectMonth v-model="month"></SelectMonth>
                <SelectYear v-model="year"></SelectYear>
                <AlertError :errorList="errorList" v-if="errorList.length > 0"></AlertError>
                <ButtonAdd></ButtonAdd>
            </form>
        </div>
    </section>
</template>

<script>
import ApiClient from '../services/ApiClient';
import AlertError from './molécules/AlertError';
import ButtonAdd from './atomes/buttons/ButtonAdd'
import AddFormTitle from './atomes/titles/AddFormTitle';
import SelectMonth from './molécules/SelectMonth';
import SelectYear from './molécules/SelectYear';
import InputGroupForm from './molécules/InputGroupForm';

export default {
    components: {
        AlertError,
        ButtonAdd,
        AddFormTitle,
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
