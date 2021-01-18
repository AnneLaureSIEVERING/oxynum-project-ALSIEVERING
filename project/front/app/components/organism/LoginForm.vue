<template>
        <section class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <form id="login" v-on:submit.prevent="checkForm">
                    <div class="mb-3">
                        <label for="identifiant" class="form-label">Votre adresse mail</label>
                        <input type="email" class="form-control" id="identifiant" aria-describedby="emailHelp" name="email" placeholder="Email" v-model="email" />
                        <div id="emailHelp" class="form-text">Vous ne devez jamais communiquer votre identifiant à qui que ce soit.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" v-model="password"/>
                    </div>
                    <AlertError :errorList="errorList" v-if="errorList.length > 0"></AlertError>
                    <ButtonLogin></ButtonLogin>
                </form>
            </div>
        </section>
</template>

<script>
import ApiClient from '../../services/ApiClient';
import AlertError from '../molecule/AlertError';
import ButtonLogin from '../atoms/buttons/ButtonLogin';

export default {
    name: "LoginForm",
    components: {
        AlertError,
        ButtonLogin
    },
    data: function() {
        return {
            email: "",
            password: "",
            errorList: []
        }
    },
    methods: {
        async checkForm() {

            this.errorList = [];

            if (this.email.length < 4) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Veuillez indiquer un email valide",
                });
            }
            if (this.password.length < 6) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Veuillez indiquer un mot de passe valide",
                });
            }

            if (this.errorList.length === 0) {
               let responseApi = await ApiClient.post('/login', {
                 email: this.email,
                 password: this.password
                });
                console.log(responseApi);

                if (responseApi.request.status == 200 && typeof responseApi.data==="object") {
                    const userName = responseApi.data.firstname;
                    const userID = responseApi.data.user;
                    localStorage.setItem('user-name', userName);
                    localStorage.setItem('user', userID);

                    this.$router.push({name: 'incomesList'});
                } else {
                    this.errorList.push({
                        id: this.errorList.length + 1, 
                        message: "La connexion a échoué",
                    })
                    console.log('erreur coté api');
                }
            }   
        }
    } 
};
</script>
