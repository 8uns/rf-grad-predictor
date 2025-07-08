<div class="container dashboard">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom"><strong>Dashboard</strong></h3>
        </div>
    </div>


    <div class="row justify-content-end">
        <div class="col-9">


            <div class="row">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Total Dataset Mahasiswa</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">
                                    <br>
                                    <h1>
                                        <strong>
                                            <i class="fas fa-users"></i>
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
            </div>
            <br>
            <br>


            <div class="row justify-content-end">
                <div class="col">
                    <h6>
                        <strong>
                            Predikat
                        </strong>
                        <hr>
                    </h6>
                </div>
            </div>

            <div class="row">

                <?php
                foreach ($data['totalpredikat'] as $value): ?>
                    <div class="col-4 text-center">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title"><?= ucfirst(strtolower($value['predikat'])) ?></h5>
                                <hr>
                                <div class="row justify-content-md-center">
                                    <div class="col-8">
                                        <br>
                                        <h1>
                                            <strong>
                                                <i class="fas fa-users"></i>
                                            </strong>
                                        </h1>
                                        <h2 class="fw-bold">
                                            <?= $value['totalpredikat'] ?>
                                        </h2>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>




            </div>




            <br>
            <br>

            <!-- <div class="row justify-content-end">
                <div class="col">
                    <h6>
                        <strong>
                            Tahun Lulus
                        </strong>
                        <hr>
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Statistik Kelulusan</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">


                                    <br>
                                    <canvas id="myChart"></canvas>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>




                <div class="col-12">
                    <div id="tampil" class=""></div>
                </div>

            </div> -->



            <br>
            <br>
            <br>
        </div>
    </div>
</div>
</div>