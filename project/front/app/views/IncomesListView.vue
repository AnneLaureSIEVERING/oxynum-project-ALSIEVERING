<template>

    <main class="container pt-5">
        <NavBarre></NavBarre>
        <UserChoiceIncome></UserChoiceIncome>
        <IncomesList></IncomesList>
    </main>
    
</template>

<script>

import NavBarre from '../components/Navigation';
import UserChoiceIncome from '../components/UserChoiceIncome';
import IncomesList from '../components/IncomesList';


export default {

    components: {
        NavBarre,
        UserChoiceIncome,
        IncomesList
    }
    
}
</script>

<style scoped>

</style>