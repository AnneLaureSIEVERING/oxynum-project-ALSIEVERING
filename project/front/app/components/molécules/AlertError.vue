<template>
  <div class="alert-error">
    <ul class="error-list" v-if="errorList.length > 0">
      <li v-for="error in errorList" v-bind:key="error.id">{{ error.message }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "AlertError",
  props: {
      errorList: {
      type: Array
      }
  },
}
</script>

<style lang="scss" scoped>
    .error-list {
        color: red;
        list-style: none;
        text-align: left;
    }
</style>