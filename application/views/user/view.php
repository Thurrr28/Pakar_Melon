<!DOCTYPE html>
<html lang="en">

<head>
    <title>RPS Perancangan Web 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/'); ?>img/one.png" type="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="stylesheet" href="">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style>
        @media print {
            .print-header {
                page-break-before: always;
                /* Membuat halaman baru sebelum elemen dengan kelas .print-header */
            }

            .print-header h5,
            .print-header h4 {
                margin-top: 0;
                /* Menghilangkan margin atas untuk header */
            }
        }
    </style>
</head>

<body>
    <a href="<?= base_url('user/tablelist') ?>" class="btn btn-danger navbar-btn border d-print-none"><i class="bi bi-chevron-left"></i></a>
    <div class="container mt-3">
        <div class="row content">
            <table class="table-bordered text-center">
                <tr>
                    <td colspan="4">
                        <h1>RENCANA PEMBELAJARAN SEMESTER (RPS)</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 1px;" class="no_doc_rps">
                        <h6>FM-PJM-011/Rev.00/25 Jan 2018</h6>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><img src="<?= base_url('assets/'); ?>img/logoamikom.png" width="300"></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h3>MATA KULIAH : <?= $datarps['mata_kuliah']; ?>(<?= $datarps['kode']; ?>)</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h3>Program Studi : <?= $datarps['program_studi']; ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>No</td>
                    <td>Tgl Berlaku</td>
                    <td>Tgl Disusun</td>
                    <td>Revisi</td>
                </tr>
                <tr>
                    <td> RPS-DT-170</td>
                    <td>2 Juni 2023</td>
                    <td>2 April 2023</td>
                    <td>00</td>
                </tr>
                <tr>
                    <td>Disetujui oleh
                        <p>Dekan Ilmu Komputer</p>
                    </td>
                    <td>Diperiksa oleh
                        <p>Kaprodi D3TI</p>
                    </td>
                    <td>Disusun oleh
                        <p>Koordinator MK</p>
                    </td>
                    <td>Dikendalikan oleh
                        <p>Sekprodi D3TI</p>
                    </td>
                </tr>
                <tr>
                    <td><img src="<?= base_url('assets/'); ?>img/ttd.png" alt="" width="100px" height="100px"></td>
                    <td><img src="<?= base_url('assets/'); ?>img/ttd.png" alt="" width="100px" height="100px"></td>
                    <td><img src="<?= base_url('assets/'); ?>img/ttd.png" alt="" width="100px" height="100px"></td>
                    <td><img src="<?= base_url('assets/'); ?>img/ttd.png" alt="" width="100px" height="100px"></td>
                </tr>
                <tr>
                    <td>Firman Asharudin, M.Kom</td>
                    <td>Firman Asharudin, M.Kom</td>
                    <td>Firman Asharudin, M.Kom</td>
                    <td>Firman Asharudin, M.Kom</td>
                </tr>

                <tr>
                    <td colspan="4">
                        <h2>UNIVERSITAS AMIKOM YOGYAKARTA</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h2>YOGYAKARTA</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h2>2023</h1>
                    </td>
                </tr>

            </table>

            <br>
            <div class="p-0 mt-4 print-header">
                <table class="table text-center table-bordered border border-secondary">
                    <tr>
                        <td rowspan="2">
                            <img src="<?= base_url('assets/'); ?>img/logoamikom.png" width="200" class="my-5">
                        </td>
                        <td rowspan="2">
                            <h5 class="mt-4">RENCANA PEMBELAJARAN SEMESTER (RPS)</h5>
                            <h5 class="text-uppercase">PROGRAM STUDI : D3 <?= $datarps['program_studi']; ?></h5>
                            <h4>MATA KULIAH <?= $datarps['mata_kuliah']; ?></h4>
                        </td>
                        <td>
                            <p><i>No</i></p>
                            <p><i>Tgl Disusun</i></p>
                            <p><i>Revisi</i></p>
                        </td>
                        <td>
                            <p class="text-start">: <i> RPS-TI-DT170</i></p>
                            <p class="text-start">: <i>2-April-2023</i></p>
                            <p class="text-start">: <i>00</i></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><i>Halaman</i></p>
                        </td>
                        <td class="text-start">: <i>Hal. 1 dari 20</i></td>
                    </tr>
                </table>
            </div>

            <div class="container p-0">
                <div style="background-color: #808080">
                    <p class="py-2 mx-4"><b>1. Identitas</b></p>
                </div>
            </div>

            <div class="container-fluid">
                <table class="table table-bordered">
                    <tr>
                        <td>Program Studi</td>
                        <td colspan="2"><?= $datarps['program_studi']; ?></td>
                        <td>Semester</td>
                        <td colspan="2"><?= $datarps['semester']; ?></td>
                    </tr>

                    <tr>
                        <td>Nama & Kode Mata Kuliah</td>
                        <td colspan="2"><?= $datarps['mata_kuliah']; ?>(<?= $datarps['kode']; ?>)</td>
                        <td>Bobot SKS</td>
                        <td colspan="2"><?= $datarps['sks']; ?></td>
                    </tr>

                    <tr>
                        <td>Persentase nilai</td>
                        <td colspan="2"><?= $datarps['bobot']; ?></td>
                        <td>Dosen Pengampu</td>
                        <td colspan="2">Firman Asharudin</i></td>
                    </tr>

                    <tr>
                        <td colspan="7" class="text-center">Klasifikasi Nilai:</td>
                    </tr>

                    <tr>
                        <td colspan="2"> >80% = A</td>
                        <td>60 & < 80=B</td>
                        <td>40 & < 60=C</td>
                        <td>20 & < 40=D</td>
                        <td colspan="2">
                            < 20=E</td>
                    </tr>
                </table>
            </div>
            <div class="container p-0">
                <div class="box" style="background-color: #808080;">
                    <p class="py-2 mx-4"><b>2. Gambaran Umum</b></p>
                </div>
                <div class="gambaran-umum mx-4">
                    <p><?= $datarps['gambaran_umum']; ?></p>

                </div>
            </div>

            <div class="container p-0">
                <div class="box" style="background-color: #808080;">
                    <p class="py-2 mx-4"><b>3. Capaian Pembelajaran</b></p>
                </div>
                <div class="gambaran-umum mx-4">
                    <p><?= $datarps['capaian_pembelajaran']; ?></p>
                </div>
            </div>
            <div class="container p-0">
                <div class="box" style="background-color: #808080">
                    <p class="py-2 mx-4"><b>4. Persyaratan dan Pengetahuan Awal(Prior Knowledge)</b></p>
                </div>
                <div class="gambaran-umum mx-4">
                    <p><?= $datarps['prasyarat']; ?></p>

                </div>
            </div>

            <div class="container p-0 d-print-none">
                <table class="table text-center table-bordered border border-secondary">
                    <tr>
                        <td rowspan="2">
                            <img src="<?= base_url('assets/'); ?>img/logoamikom.png" width="200" class="my-5">
                        </td>
                        <td rowspan="2">
                            <h5 class="mt-4">RENCANA PEMBELAJARAN SEMESTER (RPS)</h5>
                            <h5 class="text-uppercase">PROGRAM STUDI : D3 <?= $datarps['program_studi']; ?></h5>
                            <h4>MATA KULIAH <?= $datarps['mata_kuliah']; ?></h4>
                        </td>
                        <td>
                            <p><i>No</i></p>
                            <p><i>Tgl Disusun</i></p>
                            <p><i>Revisi</i></p>
                        </td>
                        <td>
                            <p class="text-start">: <i> RPS-TI-DT170</i></p>
                            <p class="text-start">: <i>2-April-2023</i></p>
                            <p class="text-start">: <i>00</i></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><i>Halaman</i></p>
                        </td>
                        <td class="text-start">: <i>Hal. 2 dari 20</i></td>
                    </tr>
                </table>
            </div>

            <div class="container p-0">
                <div class="" style="background-color: #808080;">
                    <p class="py-2 mx-4 "><b>5. Unit-Unit Pembelajaran secara Spesifik</b></p>
                </div>
                <div class="tabel1">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4" id="table">
                            <thead>
                                <tr class="text-center" style="background-color: #808080;">
                                    <th scope="col">Kemampuan Akhir yang diharapkan</th>
                                    <th scope="col">Indikator</th>
                                    <th scope="col">Bahan Kajian</th>
                                    <th scope="col">Metode Pembelajaran</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Metode Penilaian</th>
                                    <th scope="col">Bahan Ajar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['indikator']; ?></td>
                                    <td><?= $datarps['bahan_kajian']; ?>
                                    </td>
                                    <td><?= $datarps['metode_pembelajaran']; ?></td>
                                    <td><?= $datarps['waktu']; ?></td>
                                    <td><?= $datarps['metode_penilaian']; ?></td>
                                    <td><?= $datarps['bahan_ajar']; ?></td>

                                </tr>
                                <tr>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['indikator']; ?></td>
                                    <td><?= $datarps['bahan_kajian']; ?>
                                    </td>
                                    <td><?= $datarps['metode_pembelajaran']; ?></td>
                                    <td><?= $datarps['waktu']; ?></td>
                                    <td><?= $datarps['metode_penilaian']; ?></td>
                                    <td><?= $datarps['bahan_ajar']; ?></td>

                                </tr>
                                <tr>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['indikator']; ?></td>
                                    <td><?= $datarps['bahan_kajian']; ?>
                                    </td>
                                    <td><?= $datarps['metode_pembelajaran']; ?></td>
                                    <td><?= $datarps['waktu']; ?></td>
                                    <td><?= $datarps['metode_penilaian']; ?></td>
                                    <td><?= $datarps['bahan_ajar']; ?></td>

                                </tr>
                                <tr>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['indikator']; ?></td>
                                    <td><?= $datarps['bahan_kajian']; ?>
                                    </td>
                                    <td><?= $datarps['metode_pembelajaran']; ?></td>
                                    <td><?= $datarps['waktu']; ?></td>
                                    <td><?= $datarps['metode_penilaian']; ?></td>
                                    <td><?= $datarps['bahan_ajar']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="container mt-1">
                <div class="box" style="background-color: #808080;">
                    <p class="py-2 mx-4 "><b>6. Tugas/Aktivitas dan Penilaian</b></p>
                </div>
                <div class="tabel2">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4" id="table">
                            <thead>
                                <tr class="text-center" style="background-color: #808080;">
                                    <th scope="col">Tugas/ <br> Aktivitas</th>
                                    <th scope="col">Kemampuan akhir yang diharapkan</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Kriterian Penilaian</th>
                                    <th scope="col">Indikator Penilaian</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><?= $datarps['aktivitas']; ?></td>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['waktu_tugas']; ?>
                                    </td>
                                    <td><?= $datarps['bobot']; ?></td>
                                    <td><?= $datarps['kriteria']; ?></td>
                                    <td><?= $datarps['indikator_penilaian']; ?></td>

                                </tr>
                                <tr>
                                    <td><?= $datarps['aktivitas']; ?></td>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['waktu_tugas']; ?>
                                    </td>
                                    <td><?= $datarps['bobot']; ?></td>
                                    <td><?= $datarps['kriteria']; ?></td>
                                    <td><?= $datarps['indikator_penilaian']; ?></td>

                                </tr>
                                <tr>
                                    <td><?= $datarps['aktivitas']; ?></td>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['waktu_tugas']; ?>
                                    </td>
                                    <td><?= $datarps['bobot']; ?></td>
                                    <td><?= $datarps['kriteria']; ?></td>
                                    <td><?= $datarps['indikator_penilaian']; ?></td>

                                </tr>
                                <tr>
                                    <td><?= $datarps['aktivitas']; ?></td>
                                    <td><?= $datarps['kemampuan']; ?></td>
                                    <td><?= $datarps['waktu_tugas']; ?>
                                    </td>
                                    <td><?= $datarps['bobot']; ?></td>
                                    <td><?= $datarps['kriteria']; ?></td>
                                    <td><?= $datarps['indikator_penilaian']; ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="box" style="background-color: #808080;">
                    <p class="py-2 mx-4"><b>7. Referensi</b></p>
                </div>
                <div class="gambaran-umum mx-4">
                    <p><?= $datarps['referensi']; ?>.</p>


                </div>
            </div>
            <!-- Rencana Pelaksanaan Pembelajaran  -->
            <div class="container">
                <div class="box" style="background-color: #808080;">
                    <p class="py-2 mx-4 "><b>8. Rencana Pelaksanaan Pembelajaran</b></p>
                </div>

                <div class="tabel">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Minggu/Pertemuan</th>
                                    <th scope="col">Kemampuan Akhir yang Diharapkan</th>
                                    <th scope="col">Indikator</th>
                                    <th scope="col">Topik & Sub Topik</th>
                                    <th scope="col">Aktivitas dan Strategi Pembelajaran</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Penilaian</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($datamateri as $mhs) : ?>
                                    <tr>
                                        <td>Pertemuan<br>ke-<?= $mhs['pertemuan']; ?></td>
                                        <td><?= $mhs['kemampuan_akhir']; ?></td>
                                        <td><?= $mhs['indikator_materi']; ?></td>
                                        <td><?= $mhs['topik']; ?></td>
                                        <td><?= $mhs['aktivitas_pembelajaran']; ?></td>
                                        <td><?= $mhs['waktu_matkul']; ?> Menit</td>
                                        <td><?= $mhs['penilaian']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end d-print-none">
                                <a href="<?= base_url('user/tablelist') ?>" class="btn btn-danger navbar-btn d-print-none"><i class="bi bi-chevron-left"></i></a>
                                <a href="javascript:void(0);" id="printButton" class="btn btn-primary border d-print-none">Cetak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("printButton").addEventListener("click", function() {
                window.print();
            });
        </script>
        <!-- end rencana pembelajaran  -->