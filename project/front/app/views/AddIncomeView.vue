<template>

    <main class="container pt-5">
        <NavBarre></NavBarre>
        <AddFormIncome></AddFormIncome>
    </main>
    
</template>

<script>

import NavBarre from '../components/organism/Navigation';
import AddFormIncome from '../components/organism/AddFormIncome';

export default {
    components: {
        NavBarre,
        AddFormIncome
    }

    
}
</script>

<style scoped>

</style>