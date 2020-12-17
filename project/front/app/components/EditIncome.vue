<template>

    <div>
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier un revenu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" v-on:click="update">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>

import ApiClient from '../services/ApiClient';

export default {
    props: ["incomeID"],
    data: function () {
        return {
            month: "",
            year: "",
            amount: "",
            errorList: []
        };
    },
    methods: {
      update() {

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
                ApiClient.post('/income/update/'+this.incomeID, {
                    month: this.month,
                    year: this.year,
                    amount: this.amount,
                })
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
    
}
</script>

<style lang="scss" scoped>
    .error-list {
        color: red;
        list-style: none;
        text-align: left;
    }
</style>