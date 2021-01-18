<template>

  <main class="container">
    <HeaderForm></HeaderForm>
    <LoginFormHeader></LoginFormHeader>
    <LoginForm></LoginForm>
    <LoginFormFooter></LoginFormFooter>
  </main>

</template>

<script>

import HeaderForm from '../components/organismes/header/HeaderForm.vue';
import LoginFormHeader from '../components/organismes/header/LoginFormHeader.vue';
import LoginForm from "../components/LoginForm";
import LoginFormFooter from "../components/organismes/footer/LoginFormFooter";

export default {
  components: {
    HeaderForm,
    LoginFormHeader,
    LoginForm,
    LoginFormFooter
  },
};

</script>