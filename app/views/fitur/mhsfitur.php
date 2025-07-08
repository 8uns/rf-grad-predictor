<div class="container">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom"><strong>Dataset Mahasiswa</strong></h3>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-9">
            <?php Flasher::flashAll() ?>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-9">
            <?php

            if ($_SESSION['level'] == 0) {
            ?>
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMhs">
                    <i class="fas fa-user-plus"></i>
                    Tambah Mahasiswa baru
                </button> -->
            <?php
            }
            ?>

        </div>
    </div>
    <div class="row justify-content-end mt-3">
        <div class="col-9">

            <div class="card" style="width: 100%;">
                <div class="card-body">

                    <table id="tableSearchh" class="table  table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NPM</th>
                                <th scope="col">Nama Mahasiswa</th>

                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $i = 1;

                            foreach ($data['mhs'] as $vals) :


                            ?>
                                <tr>
                                    <th scope="row"><?= $vals['id_mhs'] ?></th>
                                    <td><?= $vals['npm'] ?></td>
                                    <td><?= $vals['nama'] ?></td>
                                    <td><?= $vals['jk'] ?></td>
                                    <td>

                                        <button title="Lihat data Mahasiswa" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#show<?= $vals['id_mhs'] ?>"><i class="fas fa-eye"></i></button>
                                        <!-- <button title="Perbarui data Mahasiswa" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#update<?= $vals['id_mhs'] ?>"><i class="fas fa-pen-square"></i></button> -->
                                        <!-- <button title="Hapus data Mahasiswa" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#hapus<?= $vals['id_mhs'] ?>"><i class="fas fa-trash-alt"></i></button> -->

                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="hapus<?= $vals['id_mhs'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mahasiswa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus data mahasiswa?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= BASEURL ?>mhs/hapusmhs/<?= $vals['id_mhs'] ?>" type="button" class="btn btn-primary">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>


                                <!-- Modal Lihat-->
                                <div class="modal fade" id="show<?= $vals['id_mhs'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Data <?= $vals['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="card mb-3" style="max-width:100%;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="<?= BASEURL ?>img/user-default.jpg" class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title"></h5>

                                                                <div class="row">
                                                                    <div class="col">
                                                                        <ul class="list-group list-group-flush">

                                                                            <li class="list-group-item">
                                                                                Nomor Induk Mahasiswa
                                                                                <div class="fw-bold"> <?= $vals['npm'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                Nama Lengkap
                                                                                <div class="fw-bold"> <?= $vals['nama'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                Program Studi
                                                                                <div class="fw-bold"> <?= $vals['prodi'] ?> </div>
                                                                            </li>

                                                                        </ul>
                                                                    </div>


                                                                    <div class="col">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item">
                                                                                Jenis Kelamin
                                                                                <div class="fw-bold"> <?= $vals['jk'] ?> </div>
                                                                            </li>

                                                                            <li class="list-group-item">
                                                                                Tahun Masuk
                                                                                <div class="fw-bold"> <?= $vals['tahun_masuk'] ?> </div>
                                                                            </li>

                                                                            <li class="list-group-item">
                                                                                Lama Studi
                                                                                <div class="fw-bold"> <?= $vals['lama_studi'] ?> </div>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item">
                                                                                IP Semester 1
                                                                                <div class="fw-bold"> <?= $vals['ip_s1'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 2
                                                                                <div class="fw-bold"> <?= $vals['ip_s2'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 3
                                                                                <div class="fw-bold"> <?= $vals['ip_s3'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 4
                                                                                <div class="fw-bold"> <?= $vals['ip_s4'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 5
                                                                                <div class="fw-bold"> <?= $vals['ip_s5'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 6
                                                                                <div class="fw-bold"> <?= $vals['ip_s6'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 7
                                                                                <div class="fw-bold"> <?= $vals['ip_s7'] ?> </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item">
                                                                                IP Semester 8
                                                                                <div class="fw-bold"> <?= $vals['ip_s8'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 9
                                                                                <div class="fw-bold"> <?= $vals['ip_s9'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 10
                                                                                <div class="fw-bold"> <?= $vals['ip_s10'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 11
                                                                                <div class="fw-bold"> <?= $vals['ip_s11'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 12
                                                                                <div class="fw-bold"> <?= $vals['ip_s12'] ?> </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                IP Semester 3
                                                                                <div class="fw-bold"> <?= $vals['ip_s3'] ?> </div>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                $i++;
                            endforeach;
                            ?>


                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-muted">
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <nav aria-label="...">
                                <ul class="pagination">


                                    <?php if (($data['i'] - 1) > 0): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL . 'mhs/index/' . ($data['i'] - 1) ?>">Previous</a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled">

                                            <span class="page-link">Previous</span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (($data['i'] - 2) > 0): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL . 'mhs/index/' . ($data['i'] - 2) ?>"><?= $data['i'] - 2 ?></a>
                                        </li>

                                    <?php endif; ?>
                                    <?php if (($data['i'] - 1) > 0): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL . 'mhs/index/' . ($data['i'] - 1) ?>"><?= $data['i'] - 1 ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link"><?= $data['i'] ?></span>
                                    </li>

                                    <?php if (($data['i'] + 1) <= round($data['totalmhs']['totalmhs'] / 20)): ?>

                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL . 'mhs/index/' . ($data['i'] + 1) ?>"><?= $data['i'] + 1 ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (($data['i'] + 2) <= round($data['totalmhs']['totalmhs'] / 20)): ?>

                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL . 'mhs/index/' . ($data['i'] + 2) ?>"><?= $data['i'] + 2 ?></a>
                                        </li>
                                    <?php endif; ?>


                                    <?php if (($data['i'] + 1) <= round($data['totalmhs']['totalmhs'] / 20)): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= BASEURL . 'mhs/index/' . ($data['i'] + 1) ?>">Next</a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled">

                                            <span class="page-link">Next</span>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Modal tambah Mahasiswa -->
<div class="modal fade" id="tambahMhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="mhs/create" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menambahkan Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input required name="username" type="text" class="form-control" id="">
                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input required name="password" type="password" class="form-control" id="">
                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Nomor Induk Mahasiswa</label>
                        <input required name="nim" type="text" class="form-control" id="" aria-describedby="">
                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input required name="name" type="text" class="form-control" id="" aria-describedby="">
                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                    </div>

                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select id="" name="gender" class="form-select">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>



                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input required name="phone" type="text" class="form-control" id="">
                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </div>
        </form>

    </div>
</div>

<br>
<br>
<br>