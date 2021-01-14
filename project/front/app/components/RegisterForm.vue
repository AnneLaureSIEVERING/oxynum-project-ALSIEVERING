<template>
    <section class="row justify-content-center mt-5">
        <h2 class="text-center fs-4 mb-5">Pour vous inscrire rien de plus simple</h2>
            <div class="col-12 col-md-8 col-lg-6">
                <form id="registration" v-on:submit.prevent="checkForm">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" v-model="firstname">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Veuillez renseigner votre adresse mail</label>
                        <input type="email" class="form-control" id="email" name="email" v-model="email">
                    </div>
                    <div class="mb-3">
                        <label for="checkEmail" class="form-label">Confirmation de l'adresse mail</label>
                        <input type="email" class="form-control" id="checkEmail" name="checkEmail" v-model="checkEmail">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Veuillez choisir un mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" v-model="password">
                        <div id="passwordHelp" class="form-text">Le mot de passe doit avoir au moins 6 caractéres.</div>
                    </div>
                    <div class="mb-5">
                        <label for="checkPassword" class="form-label">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" id="checkPassword" name="checkPassword" v-model="checkPassword">
                    </div>
                    <AlertError :errorList="errorList" v-if="errorList.length > 0"></AlertError>
                    <div class=" mb-5 text-center">
                        <button type="submit" class="btn btn-info btn-lg text-light">Créer un compte</button>
                    </div>
                </form>
            </div>
    </section>
</template>

<script>
import ApiClient from '../services/ApiClient';
import AlertError from './molécules/AlertError';

export default {
    components: {
        AlertError
    },
    data: function() {
        return {
            firstname: "",
            email: "",
            checkEmail:"",
            password:"",
            checkPassword:"",
            errorList: []
        }
    },
    methods: {
        checkForm() {

            this.errorList = [];

            if (this.firstname.length < 1) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Veuillez renseigner votre prénom"
                });
            }

            if (this.email.length < 4) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Veuillez indiquer un email valide"
                });
            }
            if (this.checkEmail.length < 4) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Vous n'avez pas confirmé votre email"
                });
            }
            if (this.password.length < 6) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Veuillez indiquer un mot de passe valide",
                });
            }
            if (this.checkPassword.length < 6) {
                this.errorList.push({
                    id: this.errorList.length + 1, 
                    message: "Vous n'avez pas confirmé votre mot de passe"
                });
            }

            if (this.errorList.length === 0) {
                if(this.email == this.checkEmail && this.password == this.checkPassword){
                    ApiClient.post('/register', {
                        firstname: this.firstname,
                        email: this.email,
                        password: this.password
                     })
                    .then((response) => {
                        console.log(response);

                        if (response.request.status == 200 && typeof response.data==="object") {
                            this.$router.push({name: 'login'});
                        } else {
                            this.errorList.push({
                            id: this.errorList.length + 1, 
                            message: "La création du compte a échoué",
                        })
                            console.log('erreur coté api');
                        }
                     })
                } else {
                    this.errorList.push({
                            id: this.errorList.length + 1, 
                            message: "La création du compte a échoué",
                    })
                    console.log("les identifiants ne concordent pas avec la vérification")
                }
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