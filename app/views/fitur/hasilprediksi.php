<div class="container">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom"><strong>Hasil Prediksi</strong></h3>
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

            <div class="row">
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">

                            <table id="tableSearchh" class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Fitur</th>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Nama Mahasiswa</td>
                                        <td><?= $data['mhs']['nama'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Program Studi</td>
                                        <td><?= $data['mhs']['prodi'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?= $data['mhs']['jk'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>IP Semester 1</td>
                                        <td><?= $data['mhs']['ip_s1'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>IP Semester 2</td>
                                        <td><?= $data['mhs']['ip_s2'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>IP Semester 3</td>
                                        <td><?= $data['mhs']['ip_s3'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>IP Semester 4</td>
                                        <td><?= $data['mhs']['ip_s4'] ?></td>
                                    </tr>

                                    

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col text-center">

                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Hasil Prediksi Predikat</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h2 class="fw-bold">
                                        <?= $data['prediction']['prediction'] ?>
                                    </h2>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>
</div>


<br>
<br>
<br>