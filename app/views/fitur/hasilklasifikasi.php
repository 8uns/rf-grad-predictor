<?php
// header("Content-Type: application/json; charset=UTF-8");

// // 📌 Path file JSON
// $file = BASEURL . "file/dataReturn.json";

// // 📌 Membaca isi file JSON
// $json_data = file_get_contents($file);

// // 📌 Mengubah JSON menjadi array PHP
// $data = json_decode($json_data, true);

// // 📌 Menampilkan isi array
// print_r($data);
// return $data;


?>

<div class="container dashboard">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom"><strong>Hasil Klasifikasi</strong></h3>
        </div>
    </div>


    <div class="row justify-content-end">
        <div class="col-9">

            <div class="row">

                <div class="col-4 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Model Latih</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h1>
                                        <strong>
                                            <?= $data['jsonResult']['modelinfo'] == true ? '<i class="fas fa-check-circle text-primary"></i>' : '<i class="fas fa-times-circle text-danger"></i>' ?>

                                        </strong>
                                    </h1>
                                    <h6 class="fw-bold">
                                        <?= $data['jsonResult']['modelinfo'] == true ? "Model Telah Berhasil Dibuat" : "Model Telah Gagal Dibuat" ?>
                                    </h6>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Proses Keseluruhan</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h1>
                                        <strong>
                                            <i class="fas fa-hourglass-half text-warning"></i>
                                        </strong>
                                    </h1>
                                    <h5 class="fw-bold">
                                        <?= $data['execution_time'] . " detik" ?>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Proses Pelatihan</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h1>
                                        <strong>
                                            <i class="fas fa-stopwatch text-success"></i>
                                        </strong>
                                    </h1>
                                    <h5 class="fw-bold">
                                        <?= $data['jsonResult']['execution_time'] . " detik" ?>
                                    </h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <br>
            <br>


            <div class="row">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Sempel Dataset</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col table-responsive">
                                    <table class="table table-bordered" style="font-size: 10px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Prodi</th>
                                                <th scope="col">JK</th>
                                                <th scope="col">IpS1</th>
                                                <th scope="col">IpS2</th>
                                                <th scope="col">IpS3</th>
                                                <th scope="col">IpS4</th>
                                                <th scope="col">IpS5</th>
                                                <th scope="col">IpS6</th>
                                                <th scope="col">IpS7</th>
                                                <th scope="col">IpS8</th>
                                                <th scope="col">IpS9</th>
                                                <th scope="col">IpS10</th>
                                                <th scope="col">IpS11</th>
                                                <th scope="col">IpS12</th>
                                                <th scope="col">IpS13</th>
                                                <th scope="col">Lama Studi</th>
                                                <th scope="col">Predikat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($data['mhs'] as $val): ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= $val['prodi'] ?></td>
                                                    <td><?= $val['jk'] ?></td>
                                                    <td><?= $val['ip_s1'] ?></td>
                                                    <td><?= $val['ip_s2'] ?></td>
                                                    <td><?= $val['ip_s3'] ?></td>
                                                    <td><?= $val['ip_s4'] ?></td>
                                                    <td><?= $val['ip_s5'] ?></td>
                                                    <td><?= $val['ip_s6'] ?></td>
                                                    <td><?= $val['ip_s7'] ?></td>
                                                    <td><?= $val['ip_s8'] ?></td>
                                                    <td><?= $val['ip_s9'] ?></td>
                                                    <td><?= $val['ip_s10'] ?></td>
                                                    <td><?= $val['ip_s11'] ?></td>
                                                    <td><?= $val['ip_s12'] ?></td>
                                                    <td><?= $val['ip_s13'] ?></td>
                                                    <td><?= $val['lama_studi'] ?></td>
                                                    <th><?= $val['PREDIKAT'] ?></td>
                                                </tr>
                                            <?php $i++;
                                            endforeach; ?>

                                            <tr>
                                                <th scope="row">...</th>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


            <!-- <div class="row justify-content-end">
                <div class="col">
                    <h6>
                        <strong>
                            Lebel
                        </strong>
                        <hr>
                    </h6>
                </div>
            </div> -->

            <div class="row">

                <div class="col-4 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Dataset</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h1>
                                        <strong>
                                            <i class="fas fa-database"></i>
                                        </strong>
                                    </h1>
                                    <h2 class="fw-bold">
                                        <?= $data['totalmhs']['totalmhs'] ?>
                                    </h2>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Training Data</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h1>
                                        <strong>
                                            <i class="fas fa-database"></i>
                                        </strong>
                                    </h1>
                                    <h2 class="fw-bold">
                                        <?= $data['jsonResult']['lenXtrain'] ?>
                                    </h2>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Test Data</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h1>
                                        <strong>
                                            <i class="fas fa-database"></i>
                                        </strong>
                                    </h1>
                                    <h2 class="fw-bold">
                                        <?= $data['jsonResult']['lenXtest'] ?>
                                    </h2>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>





            </div>
            <br>
            <br>


            <div class="row">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Sempel Data Feature Matrix (Kategorikal menjadi Angka)</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col table-responsive">
                                    <table class="table table-bordered" style="font-size: 10px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Prodi</th>
                                                <th scope="col">JK</th>
                                                <th scope="col">IpS1</th>
                                                <th scope="col">IpS2</th>
                                                <th scope="col">IpS3</th>
                                                <th scope="col">IpS4</th>
                                                <th scope="col">IpS5</th>
                                                <th scope="col">IpS6</th>
                                                <th scope="col">IpS7</th>
                                                <th scope="col">IpS8</th>
                                                <th scope="col">IpS9</th>
                                                <th scope="col">IpS10</th>
                                                <th scope="col">IpS11</th>
                                                <th scope="col">IpS12</th>
                                                <th scope="col">IpS13</th>
                                                <th scope="col">Lama Studi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($data['jsonResult']['X'] as $val): ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= $val['prodi'] ?></td>
                                                    <td><?= $val['jk'] ?></td>
                                                    <td><?= $val['ip_s1'] ?></td>
                                                    <td><?= $val['ip_s2'] ?></td>
                                                    <td><?= $val['ip_s3'] ?></td>
                                                    <td><?= $val['ip_s4'] ?></td>
                                                    <td><?= $val['ip_s5'] ?></td>
                                                    <td><?= $val['ip_s6'] ?></td>
                                                    <td><?= $val['ip_s7'] ?></td>
                                                    <td><?= $val['ip_s8'] ?></td>
                                                    <td><?= $val['ip_s9'] ?></td>
                                                    <td><?= $val['ip_s10'] ?></td>
                                                    <td><?= $val['ip_s11'] ?></td>
                                                    <td><?= $val['ip_s12'] ?></td>
                                                    <td><?= $val['ip_s13'] ?></td>
                                                    <td><?= $val['lama_studi'] ?></td>
                                                </tr>
                                            <?php
                                                if ($i > 20) {
                                                    break; // Hentikan loop setelah 20 data
                                                }
                                                $i++;
                                            endforeach; ?>


                                            <tr>
                                                <th scope="row">...</th>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>



            <div class="row">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Data Target Vector (Kategorikal menjadi Angka)</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col table-responsive">
                                    <table class="table table-bordered" style="font-size: 10px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Angka</th>
                                                <th scope="col">Label</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($data['jsonResult']['y_labels'] as $key => $val): ?>
                                                <tr>

                                                    <td><?= $key ?></td>
                                                    <td><?= $val ?></td>
                                                </tr>
                                            <?php
                                            endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


            <div class="row">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Plot Visualisasi</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col table-responsive">
                                    <h2>
                                        <img width="100%" src="<?= BASEURL . $data['jsonResult']['tree_visualization_url'] ?>" alt="">
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>



            <div class="row">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Hasil Akurasi Model Random Forest (Accuracy Score)</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col table-responsive">
                                    <h2>
                                        <?php $accuracy_integer = (int) $data['jsonResult']['accuracy'] ?>
                                        <?= $accuracy_integer . "(" . ($accuracy_integer * 100 / 1) . "%)" ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>


            <div class="row">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Prediksi Benar (Confusion Matrix)</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col table-responsive">
                                    <table class="table table-bordered" style="font-size: 10px;">

                                        <tbody>

                                            <?php
                                            foreach ($data['jsonResult']['cm'] as $key => $val): ?>
                                                <tr>

                                                    <td><?= $val[0] ?></td>
                                                    <td><?= $val[1] ?></td>
                                                    <td><?= $val[2] ?></td>
                                                </tr>
                                            <?php
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>






            <br>
            <br>
            <br>
        </div>
    </div>
</div>
</div>