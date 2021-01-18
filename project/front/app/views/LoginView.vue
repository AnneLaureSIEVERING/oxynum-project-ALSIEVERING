<template>

  <main class="container">
    <HeaderForm></HeaderForm>
    <LoginFormHeader></LoginFormHeader>
    <LoginForm></LoginForm>
    <LoginFormFooter></LoginFormFooter>
  </main>

</template>

<script>

import HeaderForm from '../components/organism/header/HeaderForm.vue';
import LoginFormHeader from '../components/organism/header/LoginFormHeader.vue';
import LoginForm from "../components/organism/LoginForm";
import LoginFormFooter from "../components/organism/footer/LoginFormFooter";

export default {
  components: {
    HeaderForm,
    LoginFormHeader,
    LoginForm,
    LoginFormFooter
  },
};

</script>