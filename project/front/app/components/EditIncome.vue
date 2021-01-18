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
                            <InputGroupForm v-model="amount">></InputGroupForm>
                            <SelectMonth v-model="month"></SelectMonth>
                            <SelectYear v-model="year"></SelectYear>
                            <AlertError :errorList="errorList" v-if="errorList.length > 0"></AlertError>
                        </form>
                    </div>
                    <ButtonModal></ButtonModal>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ApiClient from '../services/ApiClient';
import AlertError from './molécules/AlertError';
import ButtonModal from './atomes/buttons/ButtonModal';
import SelectMonth from './molécules/SelectMonth';
import SelectYear from './molécules/SelectYear';
import InputGroupForm from './molécules/InputGroupForm';

export default {
    components: {
        AlertError,
        ButtonModal,
        SelectMonth,
        SelectYear,
        InputGroupForm
    },
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
