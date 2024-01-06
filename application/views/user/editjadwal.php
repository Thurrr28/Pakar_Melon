<div class="content">
    <!-- body rps -->
    <div class="row">
        <div class="container">
            <div class="container-fluid card">
                <div>
                    <h1 class="h3 mb-4 mt-1 text-gray-800"><?= $title ?></h1>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body border shadow-sm p-3 mb-3 bg-white rounded">
                        <nav class="navbar navbar-inverse position-absolute top-0 end-0">
                            <div class="container-fluid">
                                <a href="<?= base_url('user/jadwal') ?>" class="btn btn-danger navbar-btn border mt-1"><i class="bi bi-chevron-left"></i></a>
                            </div>
                        </nav>
                        <form action="<?= base_url('user/editjadwal/') . $datajadwal['id_jadwal']; ?>" class="row g-3" method="POST">
                            <div class="col-md-6">
                                <label for="ruang" class="form-label">Ruang</label>
                                <input type="text" class="bg-light input form-control" name="ruang" value="<?= $datajadwal['ruang']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="matkul" class="form-label">Mata Kuliah</label>
                                <input type="text" class="bg-light input form-control" name="matkul" value="<?= $datajadwal['matkul']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="waktu_mengajar" class="form-label">Waktu</label>
                                <select name="waktu_mengajar" class="bg-light input form-control">
                                    <option value="<?= $datajadwal['waktu_mengajar']; ?>"><?= $datajadwal['waktu_mengajar']; ?></option>
                                    <option value="07:00:00">07:00:00</option>
                                    <option value="08:50:00">08:50:00</option>
                                    <option value="10:40:00">10:40:00</option>
                                    <option value="13:20:00">13:20:00</option>
                                    <option value="15:30:00">15:30:00</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="metode_pelajaran" class="form-label">Metode Pembelajaran</label>
                                <select name="metode_pelajaran" class="bg-light input form-control">
                                    <selected value="<?= $datajadwal['waktu_mengajar']; ?>">
                                    <option value="Daring">Daring</option>
                                    <option value="Luring">Luring</option>
                                </select>
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="mb-3 buat btn btn-primary border col-12 mb-3 d-flex justify-content-center mt-3">CREATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>