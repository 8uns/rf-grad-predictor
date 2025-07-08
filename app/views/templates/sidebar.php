<div class="container sidebar">
  <div class="row">
    <div class="col-3">

      <ul class="nav flex-column">
        <li class="nav-item pb-2">
          <a class="nav-link   <?php if ($data['judul'] == 'dashboard') : echo 'active';
                                else: echo 'text-dark';
                                endif; ?>" aria-current="page" href="<?= BASEURL ?>dashboard">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard</a>
        </li>
        <li class="nav-item pb-2">
          <a class="nav-link  <?php if ($data['judul'] == 'mhs') : echo 'active text-light';
                              else: echo 'text-dark';
                              endif; ?>" href="<?= BASEURL ?>mhs">
            <i class="fas fa-users"></i>
            Dataset Mahasiswa</a>
        </li>
        <!-- <li class="nav-item pb-2">
            <a class="nav-link  <?php if ($data['judul'] == 'kriteria') : echo 'active';
                                else: echo 'text-dark';
                                endif; ?>" href="<?= BASEURL ?>kriteria">
              <i class="fas fa-stream"></i>
              Kriteria</a>
          </li> -->

        <!-- <li class="nav-item pb-2">
            <a class="nav-link  <?php if ($data['judul'] == 'alternatif') : echo 'active';
                                else: echo 'text-dark';
                                endif; ?>" href="<?= BASEURL ?>alternatif">
              <i class="fas fa-list"></i>
              Pembagian Data </a>
          </li> -->

        <li class="nav-item pb-2">
          <a class="nav-link  <?php if ($data['judul'] == 'klasifikasi') : echo 'active';
                              else: echo 'text-dark';
                              endif; ?>" href="<?= BASEURL ?>klasifikasi">
            <i class="fas fa-history"></i>
            Proses Klasifikasi</a>
        </li>






        <li class="nav-item pb-2">
          <a class="nav-link  <?php if ($data['judul'] == 'profil') : echo 'active';
                              else: echo 'text-dark';
                              endif; ?>" href="<?= BASEURL ?>profil">
            <i class="fas fa-user-circle"></i>
            Pengaturan Akun</a>
        </li>

        <li class="nav-item pb-2">
          <a class="nav-link  <?php if ($data['judul'] == 'perangkingan') : echo 'active';
                              else: echo 'text-dark';
                              endif; ?>" href="<?= BASEURL ?>perangkingan">
            <i class="fas fa-sign-out-alt"></i>
            Keluar</a>
        </li>

      </ul>
    </div>
  </div>
</div>