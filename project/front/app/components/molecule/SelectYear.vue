<template>
  <div class="mb-4">
     <select class="form-select" aria-label="year">
      <option selected>Année</option>
      <option v-for="year in yearList" :key="year.value">{{year.label}}</option>
    </select>
  </div>
</template>

<script>
export default {
  name: "SelectYear",
  props: {
    yearList: {
      type: Array
    }
  }
}

const arrayYearList = [
  {value: '2020', label:'2020'}, 
  {value: '2021', label: '2021'}, 
  {value: '2022', label: '2022'}
]
</script>