<template>
    <section class="mt-5 mb-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Mois</th>
                    <th scope="col">Année</th>
                    <th scope="col">Montant</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="income in incomesList" v-bind:key="income.id">
                    <th>{{income.month}}</th>
                    <td>{{income.year}}</td>
                    <td>{{income.amount}}</td>
                    <td>
                        <button type="submit" class="btn btn-outline-secondary btn-sm me-4" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="bi bi-pencil-square"></i></button>
                        <button type="submit" class="btn btn-outline-danger btn-sm" v-on:click="deleteData(income.id)"><i class="bi bi-trash"></i></button>
                        <modal v-bind:incomeID="income.id"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>

<script>

import ApiClient from '../services/ApiClient';
import modal from './EditIncome.vue';

export default {
    components: {
      modal,
    },
    data() {
        return {
            incomesList: [],
            user_id: "",
        }
    },
    mounted() {
        if (localStorage.getItem('user')) {
            this.user_id = localStorage.getItem('user');
        }

        ApiClient.post('/incomes', {
            user_id: this.user_id
        })
        .then((response) => {
            this.incomesList = response.data;
            console.log(this.incomesList);
        });
    },
    methods: {
        deleteData(id) {

            ApiClient.post('/income/delete/'+ id)
            .then((response) => {
                console.log(response);
                if (response.request.status == 200) {
                    location.reload();
                } else {
                    console.log('erreur coté api');
                }
            })
        }
    }
}
</script>

<style scoped>

</style>