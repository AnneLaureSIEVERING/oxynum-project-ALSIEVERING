<template>

    <!-- Navbar content -->
    <header class="container">
        <nav class="row navbar fixed-top  navbar-expand-lg navbar-light border border-info bg-light">
            <div class="container-fluid col-12">
                <a class="navbar-brand text-info fs-2 fw-bold ms-2" href="#">SmartUp</a>
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end ps-2" id="navbarSupportedContent">
                    <span class="navbar-text text-dark">Bonjour, utilisateur !</span>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mon compte
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/add-income">Ajouter un revenu</a></li>
                                <li><a class="dropdown-item" href="/incomes">Mes revenus</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/">Se déconnecter</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</template>

<script>
export default {
    
}
</script>

<style scoped>

</style>