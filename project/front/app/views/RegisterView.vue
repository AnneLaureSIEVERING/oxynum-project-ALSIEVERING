<template>

  <main class="container">
    <HeaderForm></HeaderForm>
    <RegisterForm></RegisterForm>
    <RegisterFormFooter></RegisterFormFooter>
  </main>

</template>

<script>

import HeaderForm from "../components/organismes/header/HeaderForm";
import RegisterForm from "../components/RegisterForm";
import RegisterFormFooter from "../components/organismes/footer/RegisterFormFooter";

export default {
  components: {
    HeaderForm,
    RegisterForm,
    RegisterFormFooter
  },
};

</script>