<template>
      <!--Form to login-->
        <section class="row mt-5 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <form id="login" action="" method="POST">
                    <div class="mb-3">
                        <label for="identifiant" class="form-label">Votre adresse mail</label>
                        <input type="email" class="form-control" id="identifiant" aria-describedby="emailHelp" name="email" placeholder="Email" required autofocus>
                        <div id="emailHelp" class="form-text">Vous ne devez jamais communiquer votre identifiant à qui que ce soit.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">Voir les caractéres</label>
                    </div>
                    <div class=" mb-5 text-center">
                        <button type="submit" class="btn btn-info btn-lg text-light">Se connecter</button>
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