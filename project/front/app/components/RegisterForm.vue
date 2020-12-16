<template>
    <section class="row justify-content-center mt-5">
        <h2 class="text-center fs-4 mb-5">Pour vous inscrire rien de plus simple</h2>
            <div class="col-12 col-md-8 col-lg-6">
                <form id="registration" action="" method="POST">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Veuillez renseigner votre adresse mail</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="checkEmail" class="form-label">Confirmation de l'adresse mail</label>
                        <input type="email" class="form-control" id="checkEmail" name="checkEmail" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Veuillez choisir un mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" required>
                        <div id="passwordHelp" class="form-text">Le mot de passe doit avoir au moins 6 caractéres.</div>
                    </div>
                    <div class="mb-5">
                        <label for="checkPassword" class="form-label">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" id="checkPassword" name="checkPassword" required>
                    </div>
                    <div class=" mb-5 text-center">
                        <button type="submit" class="btn btn-info btn-lg text-light">Créer un compte</button>
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