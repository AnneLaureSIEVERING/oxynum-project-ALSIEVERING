<template>

    <main class="container pt-5">
        <NavBarre></NavBarre>
        <AddFormIncome></AddFormIncome>
    </main>
    
</template>

<script>

import NavBarre from '../components/Navigation';
import AddFormIncome from '../components/AddFormIncome';

export default {
    components: {
        NavBarre,
        AddFormIncome
    }

    
}
</script>

<style scoped>

</style>