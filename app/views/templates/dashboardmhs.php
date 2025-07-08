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
                            <h5 class="card-title">Instrumen</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">


                                    <br>
                                    <h1 class="display-1 text-dark">
                                        <strong>
                                            <i class="fas fa-file-alt"></i>
                                        </strong>
                                    </h1>
                                    <h2 id="totalins" class="fw-bold">

                                    </h2>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php foreach ($data['kriteria'] as $keys => $krit) : ?>
                    <div class="col text-center">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $krit['name'] ?></h5>
                                <hr>
                                <div class="row justify-content-md-center">
                                    <div class="col-8">


                                        <br>
                                        <h1 class="display-1 ">
                                            <strong>
                                                <i class="fas fa-meh-rolling-eyes"></i>
                                            </strong>
                                        </h1>
                                        <h2 class="h3 fw-bold">
                                            <?php foreach ($data['valalternatif'] as $keys => $vals) :
                                                if ($vals['criteria_id'] == $krit['criteria_id']) :
                                                    if ($vals['weight']  <= 13) {
                                                        echo "Normal";
                                                    } elseif ($vals['weight']  >= 14 && $vals['weight']  <= 20) {
                                                        echo "Sedang";
                                                    } elseif ($vals['weight']  >= 21) {
                                                        echo "Sangat Parah";
                                                    }
                                                endif;
                                            endforeach; ?>

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
            <br>
        </div>
    </div>
</div>
</div>