<template>

  <main class="container">
    <HeaderForm></HeaderForm>
    <RegisterForm></RegisterForm>
    <RegisterFormFooter></RegisterFormFooter>
  </main>

</template>

<script>

import HeaderForm from "../components/organism/header/HeaderForm";
import RegisterForm from "../components/organism/RegisterForm";
import RegisterFormFooter from "../components/organism/footer/RegisterFormFooter";

export default {
  components: {
    HeaderForm,
    RegisterForm,
    RegisterFormFooter
  },
};

</script>