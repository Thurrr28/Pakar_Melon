<body>
    <div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Data Mahasiswa</h2>
    <div class="bg-white card-body border my-3 rounded">
        <?= $this->session->flashdata('message') ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Presensi Mahasiswa
            </button>
        <table class="bg-white table table-striped table-hover table-bordered text-center border shadow-sm p-3 mb-5 bg-white rounded" border="1">
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Status Absensi</th>
                <th>waktu</th>
            </tr>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr class="text-start">
                    <td><?= $mhs->nim; ?></td>
                    <td><?= $mhs->nama; ?></td>
                    <td class="d-flex justify-content-center border-0">
                        <?php
                        if ($mhs->status_absensi == 'Hadir') {
                            echo '<input class="btn btn-success" value="Hadir" readonly>';
                            echo '<form method="post" action="' . base_url('welcome/cancel_presensi') . '">
                    <input type="hidden" name="nim" value="' . $mhs->nim . '">
                    <button class="btn btn-danger" type="submit">X</button>
                  </form>';
                        } else {
                            echo '<input class="btn btn-danger" value="Tidak Hadir" readonly>';
                        }
                        ?>
                    </td>
                    <td class="col-3"><?= $mhs->waktu; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Presensi Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?= base_url('welcome/process_input'); ?>">
                                <label for="nim">NIM Mahasiswa:</label>
                                <input class="" type="text" name="nim" placeholder="xx.xx.xxxx" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

    </div>
    </div>
    </div>