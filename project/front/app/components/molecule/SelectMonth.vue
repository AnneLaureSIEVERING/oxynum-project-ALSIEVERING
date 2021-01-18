<template>
<div class="mb-4">
  <select class="form-select" aria-label="month">
    <option selected>Mois</option>
    <option v-for="month in monthList" :key="month.value">{{month.label}}</option>
  </select>
</div>
</template>

<script>
export default {
  name: "SelectMonth",
  props: {
    monthList: {
      type: Array
    }
  }
}

const arrayList = [
  {value: 'Janvier', label:'Janvier'}, 
  {value: 'Février', label: 'Fevrier'}, 
  {value: 'Mars', label: 'Mars'}, 
  {value: 'Avril', label: 'Avril'},
  {value: 'Mai', label: 'Mai'},
  {value: 'Juin', label: 'Juin'},
  {value: 'Juillet', label: 'Juillet'},
  {value: 'Août', label: 'Août'},
  {value: 'Septembre', label: 'Septembre'},
  {value: 'Octobre', label: 'Octobre'},
  {value: 'Novembre', label: 'Novembre'},
  {value: 'Décembre', label: 'Décembre'}
]
</script>