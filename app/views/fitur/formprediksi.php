<div class="container">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom"><strong>Masukan Data Mahasiswa</strong></h3>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-9">
            <?php Flasher::flashAll() ?>
        </div>
    </div>

    <div class="row justify-content-end mt-3">
        <div class="col-9">

            <div class="card" style="width: 100%;">
                <div class="card-body">

                    <form action="<?= BASEURL ?>klasifikasi/prosesprediksi" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama Mahasiswa</label>
                            <input required name="nama" type="text" class="form-control" placeholder="Masukan nama mahasiswa">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <select required class="form-select" name="prodi" aria-label="Default select example">
                                <option selected disabled>Pilih program studi</option>
                                <?php foreach ($data['prodi'] as $val): ?>
                                    <option value="<?= $val['prodi'] ?>"><?= $val['prodi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamain</label>
                            <select required class="form-select" name="jk" aria-label="Default select example">
                                <option selected disabled>Pilih jenis kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>


                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label class="form-label">IP Semester 1</label>
                                    <input name="ip_s1" type="number" step="0.01" class="form-control" placeholder="Contoh: 3.40">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">IP Semester 2</label>
                                    <input name="ip_s2" type="number" step="0.01" class="form-control" placeholder="Contoh: 3.40">
                                </div>

                            </div>
                            <div class="col">
                                 <div class="mb-3">
                                    <label class="form-label">IP Semester 3</label>
                                    <input name="ip_s3" type="number" step="0.01" class="form-control" placeholder="Contoh: 3.40">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">IP Semester 4</label>
                                    <input name="ip_s4" type="number" step="0.01" class="form-control" placeholder="Contoh: 3.40">
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Prediksi</button>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>



<br>
<br>
<br>