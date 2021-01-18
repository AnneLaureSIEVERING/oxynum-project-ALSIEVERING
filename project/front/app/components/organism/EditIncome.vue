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
                            <InputGroupForm v-model="amount"></InputGroupForm>
                            <SelectMonth v-model="month" :monthList="monthList"></SelectMonth> <!-- TODO: y ajouter la fonction qui lui sera reliée -->
                            <SelectYear v-model="year" :yearList="yearList"></SelectYear> <!-- TODO: y ajouter la fonction qui lui sera reliée -->
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
import ApiClient from '../../services/ApiClient';
import AlertError from '../molecule/AlertError';
import ButtonModal from '../atoms/buttons/ButtonModal';
import SelectMonth from '../molecule/SelectMonth';
import SelectYear from '../molecule/SelectYear';
import InputGroupForm from '../molecule/InputGroupForm';

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
            errorList: [],
            monthList: [],
            yearList: []
        };
    },
    methods: {
      async update() {

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
                let responseApi = await ApiClient.post('/income/update/'+this.incomeID, {
                    month: this.month,
                    year: this.year,
                    amount: this.amount,
                });
                console.log(responseApi);
                if (responseApi.request.status == 200) {
                    location.reload();
                } else {
                    console.log('erreur coté api');
                }
            }
        }
    }
    
}
</script>
