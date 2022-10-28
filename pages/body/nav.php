<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="login">Gestion des stagiaire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $page == "template" ? 'text-info fw-bold' : "" ?>" href="template">Template</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == "sessions" ? 'text-info fw-bold' : "" ?>" href="sessions">Sessions</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == "cookies" ? 'text-info fw-bold' : "" ?>" href="cookies">Cookies</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == "fichiers" ? 'text-info fw-bold' : "" ?>" href="fichiers">Fichiers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == "mysql" ? 'text-info fw-bold' : "" ?>" href="mysql">MySql</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == "excel" ? 'text-info fw-bold' : "" ?>" href="excel">Excel</a>
                </li>

            </ul>
            <ul class="navbar-nav  d-flex">
                <li class="nav-item">
                    <a class="nav-link <?= $page == "login" ? 'text-info fw-bold' : "" ?>" href="login">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == "register" ? 'text-info fw-bold' : "" ?>" href="register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>