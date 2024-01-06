<!--body list Rps -->
<div class="row">
    <div class="container">
        <div class="container-fluid card">
            <h1 class="h3 mb-4 mt-2 text-gray-800"><?= $title ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <nav class="navbar navbar-inverse position-absolute top-0 end-0">
                <div class="container-fluid">
                    <a href="<?= base_url('user/createmateri'); ?>" class="btn btn-primary navbar-btn border mt-1"><i class="bi bi-plus-lg"></i></a>
                    <a href="<?= base_url('user/tablelist') ?>" class="btn btn-danger navbar-btn border mt-1"><i class="bi bi-chevron-left"></i></a>
                </div>
            </nav>
            <table class="table-bordered table table-hover text-center border shadow-sm p-3 mb-5 bg-white rounded">
                <tr>
                    <th class="bg-body-secondary" scope="col">No</th>
                    <th class="bg-body-secondary">Minggu/<br>Pertemuan</th>
                    <th class="bg-body-secondary">Topik & sub Topik</th>
                    <th class="bg-body-secondary">Aktivitas dan<br>Strategi Pembelajaran</th>
                    <th class="bg-body-secondary">Waktu</th>
                    <th class="bg-body-secondary">Penilaian</th>
                    <th class="bg-body-secondary">Action</th>
                </tr>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($datarps as $mat) : ?>
                        <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td>Pertemuan<br>ke-<?= $mat['pertemuan']; ?></td>
                            <td><?= $mat['topik']; ?></td>
                            <td><?= $mat['aktivitas_pembelajaran']; ?></td>
                            <td><?= $mat['waktu_matkul']; ?> Menit</td>
                            <td><?= $mat['penilaian']; ?></td>
                            <td>
                                <a class="border btn btn-warning" href="<?= base_url('user/editmateri/') . $mat['id_materi']; ?>"><i class="bi bi-pencil-square"></i>
                                </a>
                                <a class="border btn btn-danger" href="<?= base_url('user/deleteMateri/') . $mat['id_materi']; ?>" onclick="return confirm('Are you sure to delete this?')"><i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>