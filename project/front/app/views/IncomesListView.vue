<template>

    <main class="container pt-5">
        <NavBarre></NavBarre>
        <UserChoiceIncome></UserChoiceIncome>
        <IncomesList></IncomesList>
    </main>
    
</template>

<script>

import NavBarre from '../components/organism/Navigation';
import UserChoiceIncome from '../components/organism/UserChoiceIncome';
import IncomesList from '../components/organism/IncomesList';


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