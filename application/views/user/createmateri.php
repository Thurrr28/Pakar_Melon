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
                                <a href="<?= base_url('user/tablemateri') ?>" class="btn btn-danger navbar-btn border mt-1"><i class="bi bi-chevron-left"></i></a>
                            </div>
                        </nav>
                        <form action="<?= base_url('user/createMateri'); ?>" class="row g-3" method="POST">
                            <div class="col-md-6">
                                <label for="pertemuan" class="form-label">Pertemuan/Minggu</label>
                                <input type="text" class="bg-light input form-control" name="pertemuan" required>
                            </div>
                            <div class="col-md-6">
                                <label for="penilaian" class="form-label">Penilaian</label>
                                <input type="text" class="bg-light input form-control" name="penilaian" required>
                            </div>
                            <div class="col-md-6">
                                <label for="indikator_materi" class="form-label">Indikator</label>
                                <textarea type="text" class="bg-light input form-control" rows="3" name="indikator_materi" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="topik" class="form-label">Topik & Sub Topik</label>
                                <textarea type="text" class="bg-light input form-control" rows="3" name="topik" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="aktivitas_pembelajaran" class="form-label">Aktivitas dan Strategi Pembelajaran</label>
                                <textarea type="text" class="bg-light input form-control" rows="3" name="aktivitas_pembelajaran" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="waktu_matkul" class="form-label">Waktu</label>
                                <input type="text" class="bg-light input form-control" name="waktu_matkul" required>
                            </div>
                            <div class="col-md-6">
                                <label for="kemampuan_akhir" class="form-label">Kemampuan Akhir yang Diharapkan</label>
                                <textarea type="text" class="bg-light input form-control" rows="3" name="kemampuan_akhir" required></textarea>
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