<form action="<?= base_url('user/editPenyakit/'). $datapenyakit['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane active" id="head">
                    <div class="form-row mx-2 my-2">
                        <div class="col-6">
                            <label for="nama_penyakit" class="form-label">Nama penyakit</label>
                            <input type="text" class="input form-control" name="nama_penyakit" value="<?= $datapenyakit['nama_penyakit']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="bagian_yang_diserang" class="form-label">Bagian Yang Diserang</label>
                            <input type="text" class="input form-control" name="bagian_yang_diserang" value="<?= $datapenyakit['bagian_yang_diserang']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="ciri_daun" class="form-label">ciri daun</label>
                            <input type="text" class="input form-control" name="ciri_daun" value="<?= $datapenyakit['ciri_daun']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="ciri_akar" class="form-label">ciri akar</label>
                            <input type="text" class="input form-control" name="ciri_akar" value="<?= $datapenyakit['ciri_akar']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="ciri_batang" class="form-label">ciri batang</label>
                            <input type="text" class="input form-control" name="ciri_batang" value="<?= $datapenyakit['ciri_batang']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="ciri_buah" class="form-label">ciri buah</label>
                            <input type="text" class="input form-control" name="ciri_buah" value="<?= $datapenyakit['ciri_buah']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="ciri_bunga" class="form-label">ciri bunga</label>
                            <input type="text" class="input form-control" name="ciri_bunga" value="<?= $datapenyakit['ciri_bunga']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="ciri_khusus" class="form-label">ciri khusus</label>
                            <input type="text" class="input form-control" name="ciri_khusus" value="<?= $datapenyakit['ciri_khusus']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="cara_mengatasi" class="form-label">cara mengatasi</label>
                            <input type="text" class="input form-control" name="cara_mengatasi" value="<?= $datapenyakit['cara_mengatasi']; ?>">
                        </div>
                        <div class="col-6">
                            <label for="gambar" class="form-label">gambar</label>
                            <input type="file" class="input form-control" name="gambar" value="<?= $datapenyakit['gambar']; ?>">
                        </div>
                        <div class="col-12 mb-3 d-flex justify-content-center mt-3">
                            <button type="submit" class="buat btn btn-primary border">edit</button>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>