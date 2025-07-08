<nav class="navbar navbar-expand-lg navbar-dark mb-5">
    <div class="container">

        <a class="navbar-brand text-light" href="<?= BASEURL ?>">
            <strong>
                <img src="<?= BASEURL . 'img/logo.png' ?>" alt="" width="5%">
                RF
            </strong>. Klasifikasi Predikat Kelulusan

        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> -->
            </ul>
            <span class="navbar-text">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a data-bs-toggle="dropdown" class="nav-link dropdown-toggle" aria-current="page" href="#">Selamat datang, <i class="fas fa-user-circle"></i> <?= $_SESSION['name'] ?></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if ($_SESSION['level'] > 1) :
                            ?>
                                <li>
                                    <a class="dropdown-item text-end" href="<?= BASEURL ?>profil">
                                        Profil
                                        <i class="fas fa-user-cog"></i></a>
                                </li>
                            <?php
                            endif;
                            ?>
                            <li class="">
                                <a class="dropdown-item text-end" href="<?= BASEURL ?>logout/logout">
                                    Keluar
                                    <i class="fas fa-sign-out-alt"></i></a>
                            </li>

                        </ul>
                    </li>


                </ul>
            </span>
        </div>
    </div>
</nav>