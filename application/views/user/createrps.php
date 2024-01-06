<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="content bg-white border shadow-sm p-3 mb-5 bg-white rounded">
        <ul class="nav nav-tabs mt-4">
            <li class="nav-item">
                <a class="nav-link border-end active" data-bs-toggle="tab" href="#head">Header RPS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-end" data-bs-toggle="tab" href="#gambaran">Gambaran Umum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-end" data-bs-toggle="tab" href="#capaian">Capaian Pembelajaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-end" data-bs-toggle="tab" href="#prasyarat">Prasyarat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-end" data-bs-toggle="tab" href="#unit">Unit Pembelajaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-end" data-bs-toggle="tab" href="#aktivitas">Tugas/Aktivitas dan
                    Penilaian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-end" data-bs-toggle="tab" href="#referensi">Referensi</a>
            </li>
        </ul>

        <!-- body rps -->
        <!-- Header RPS -->
        <form action="<?= base_url('user/createrps'); ?>" method="post">
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane active" id="head">
                    <div class="form-row mx-2 my-2" style="">
                        <div class="col-md-6">
                            <label for="program_studi" class="form-label">Program Studi</label>
                            <select name="program_studi" class="form-select">
                                <option selected>-</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Geografi">Geografi</option>
                                <option value="Hubungan Internasional">Hubungan Internasional</option>
                                <option value="Kewirausahaan">Kewirausahaan</option>
                                <option value="Informatika">Informatika</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="kode" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="input form-control" name="kode">
                        </div>
                        <div class="col-6">
                            <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                            <input type="text" class="input form-control" name="mata_kuliah">
                        </div>
                        <div class="col-md-6">
                            <label for="semester" class="form-label">Semester</label>
                            <select name="semester" class="form-select">
                                <option selected>-</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="sks" class="form-label">Bobot SKS</label>
                            <input type="text" class="input form-control" name="sks">
                        </div>
                        <div class="col-md-6">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="input form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- gambaran umum -->
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane" id="gambaran">
                    <div class="form-row mx-2 my-2">
                        <div class="col">
                            <label for="gambaran_umum" class="form-label">Gambaran Umum</label>
                            <textarea name="gambaran_umum" class="input form-control"></textarea>
                        </div>

                        
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Capaian Pembelajaran -->
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane" id="capaian">
                    <div class="form-row mx-2 my-2">
                        <div class="col">
                            <label for="capaian_pembelajaran" class="form-label">Capaian Pembelajaran</label>
                            <textarea name="capaian_pembelajaran" class="input form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- prasyarat -->
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane" id="prasyarat">
                    <div class="form-row mx-2 my-2">
                        <div class="col">
                            <label for="prasyarat" class="form-label">Prasyarat dan Pengetahuan Awal</label>
                            <textarea name="prasyarat" class="input form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- unit pembelajaran -->
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane" id="unit">
                    <div class="form-row mx-2 my-2">
                        <div class="col-6">
                            <label for="kemampuan" class="form-label">Kemampuan Akhir yang Diharapkan</label>
                            <textarea name="kemampuan" class="input form-control"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="indikator" class="form-label">Indikator</label>
                            <textarea name="indikator" class="input form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="bahan_kajian" class="form-label">Bahan Kajian</label>
                            <textarea name="bahan_kajian" class="input form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="metode_pembelajaran" class="form-label">Metode Pembelajaran</label>
                            <input type="text" class="input form-control" name="metode_pembelajaran">
                        </div>
                        <div class="col-md-6">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="text" class="input form-control" name="waktu">
                        </div>
                        <div class="col-md-6">
                            <label for="metode_penilaian" class="form-label">Metode Penilaian</label>
                            <input type="text" class="input form-control" name="metode_penilaian">
                        </div>
                        <div class="col-md-6">
                            <label for="bahan_ajar" class="form-label">Bahan Ajar</label>
                            <input type="text" class="input form-control" name="bahan_ajar">
                        </div>
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tugas dan aktivitas -->
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane" id="aktivitas">
                    <div class="form-row mx-2 my-2">
                        <div class="col-6">
                            <label for="aktivitas" class="form-label">Tugas/Aktivitas</label>
                            <textarea name="aktivitas" class="input form-control"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="waktu_tugas" class="form-label">Waktu</label>
                            <input type="text" class="input form-control" name="waktu_tugas">
                        </div>
                        <div class="col-md-6">
                            <label for="bobot" class="form-label">Bobot</label>
                            <input type="text" class="input form-control" name="bobot">
                        </div>
                        <div class="col-md-6">
                            <label for="kriteria" class="form-label">Kriteria Penilaian</label>
                            <input type="text" class="input form-control" name="kriteria">
                        </div>
                        <div class="col-md-6">
                            <label for="indikator_penilaian" class="form-label">Indikator Penilaian</label>
                            <textarea name="indikator_penilaian" class="input form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- referensi -->
            <div class="container tab-content mt-3">
                <div class="row bg-light border tab-pane" id="referensi">
                    <div class="form-row mx-2 my-2">
                        <div class="col">
                            <label for="referensi" class="form-label">Referensi</label>
                            <textarea name="referensi" class="input form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-flex justify-content-center mt-3">
                            <button type="submit" class="buat btn btn-primary border">CREATE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>