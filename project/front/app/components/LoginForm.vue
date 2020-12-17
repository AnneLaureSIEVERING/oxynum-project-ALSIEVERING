<template>
      <!--Form to login-->
        <section class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <form id="login" v-on:submit.prevent="checkForm">
                    <div class="mb-3">
                        <label for="identifiant" class="form-label">Votre adresse mail</label>
                        <input type="email" class="form-control" id="identifiant" aria-describedby="emailHelp" name="email" placeholder="Email" v-model="email">
                        <div id="emailHelp" class="form-text">Vous ne devez jamais communiquer votre identifiant à qui que ce soit.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" v-model="password">
                    </div>
                    <div class="alert-error">
                        <ul class="error-list" v-if="errorList.length > 0">
                            <li v-for="error in errorList" v-bind:key="error.id">{{ error.message }}</li>
                        </ul>
                    </div>
                    <div class=" mb-5 text-center">
                        <button type="submit" class="btn btn-info btn-lg text-light">Se connecter</button>
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
            email: "",
            password: "",
            errorList: []
        }
    },
    methods: {
        checkForm() {

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

                ApiClient.post('/login', {
                 email: this.email,
                 password: this.password
                })
                .then((response) => {
                    console.log(response);

                    if (response.request.status == 200) {
                        const userName = response.data.firstname;
                        localStorage.setItem('user-name', userName);
                        const userID = response.data.user;
                        localStorage.setItem('user', userID);

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