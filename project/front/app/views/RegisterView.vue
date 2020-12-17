<template>

  <main class="container">
    <HeaderForm></HeaderForm>
    <RegisterForm></RegisterForm>
    <RegisterFormFooter></RegisterFormFooter>
  </main>

</template>

<script>

import HeaderForm from "../components/header/HeaderForm";
import RegisterForm from "../components/RegisterForm";
import RegisterFormFooter from "../components/footer/RegisterFormFooter";

export default {
  components: {
    HeaderForm,
    RegisterForm,
    RegisterFormFooter
  },
};

</script>