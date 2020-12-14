<template>
    <section class="row justify-content-center border p-3 mt-5">
        <div class="col-md-4 col-lg-6 mt-5">
            <img src="../assets/images/pexels-tirelire.jpg" alt="tirelire" class="img-fluid">
        </div>
        <div class="col-12 col-md-8 col-lg-6">
            <h1 class="mt-5 mb-5 text-center fs-2">Ajouter un revenu</h1>
            <form>
                <div class="input-group mb-4">
                    <label for="newIncome" class="form-label pe-3">Montant :</label>
                    <input type="text" class="form-control" id="newIncome">
                    <span class="input-group-text" id="basic-addon2">€</span>
                </div>
                <div class="mb-4">
                    <select class="form-select" aria-label="month">
                        <option selected>Mois</option>
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </div>
                <div class="mb-4">
                    <select class="form-select" aria-label="year">
                        <option selected>Année</option>
                        <option value="1">2020</option>
                        <option value="2">2021</option>
                        <option value="3">2022</option>
                    </select>
                </div>
                <div class=" mb-5 text-center">
                    <button type="submit" class="btn btn-info btn-lg text-light">Ajouter</button>
                </div>
            </form>
        </div>
    </section>
    
</template>

<script>
export default {
    
}
</script>

<style scoped>

</style>