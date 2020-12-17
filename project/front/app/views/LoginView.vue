<template>

  <main class="container">
    <HeaderForm></HeaderForm>
    <LoginFormHeader></LoginFormHeader>
    <LoginForm></LoginForm>
    <LoginFormFooter></LoginFormFooter>
  </main>

</template>

<script>

import HeaderForm from '../components/header/HeaderForm.vue';
import LoginFormHeader from '../components/header/LoginFormHeader.vue';
import LoginForm from "../components/LoginForm";
import LoginFormFooter from "../components/footer/LoginFormFooter";

export default {
  components: {
    HeaderForm,
    LoginFormHeader,
    LoginForm,
    LoginFormFooter
  },
};

</script>