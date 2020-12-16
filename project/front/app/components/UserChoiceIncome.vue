<template>
    <!-- calculation of income obtained over a period -->
    <section class="row justify-content-center border p-3 mt-5" >
        <div class="col-md-4 col-lg-6 mt-3">
            <img src="../assets/images/pexels-gestion.png" alt="gestion" class="img-fluid">
        </div>
        <div class="mt-5 mb-3 text-center col-12 col-md-8 col-lg-6">
            <h1 class="fs-1">Mes revenus</h1>
            <h2 class="fs-4 mt-5">Vous souhaitez savoir combien vous avez gagné ?</h2>
            
        <form id="checkFormIncomes" action="" method="POST" class="text-center mt-5">
            <div class="form-check form-check-inline pe-5">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioMonth" value="month">
                <label class="form-check-label fs-5" for="inlineRadioMonth">Par mois</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioYear" value="year">
                <label class="form-check-label fs-5" for="inlineRadioYear">Par année</label>
            </div>
        </form>
            
        <div class="d-inline-block mt-5 me-4 w-25">
            <form>
                <select class="form-select" aria-label="chooseMonth">
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
            </form>
        </div>
            
        <div class="d-inline-block mt-5 w-25">
            <form>
                <select class="form-select" aria-label="chooseYear">
                    <option value="1">2020</option>
                    <option value="2">2021</option>
                    <option value="3">2022</option>
                </select>
            </form>
        </div>
            
        <div class=" mt-5 mb-5 text-center">
            <button class="btn btn-info btn-lg text-light" type="submit">Calculer</button>
        </div>
            
        <p class="text-center fs-4">En janvier, j'ai gagné : 2000 €</p>
        </div>
    </section>   
    
</template>

<script>
export default {
    
}
</script>

<style scoped>

</style>