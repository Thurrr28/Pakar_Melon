<div class="row">
    <div class="container">
        <div class="container-fluid card">
            <h1 class="h3 mb-4 mt-2 text-gray-800"><?= $title ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <nav class="navbar navbar-inverse position-absolute top-0 end-0">
                <div class="container-fluid">
                    <a href="<?= base_url('user/createHama'); ?>" class="btn btn-primary navbar-btn border mt-1"><i class="bi bi-plus-lg"></i></a>
                </div>
            </nav>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center border shadow-sm p-3 mb-5 bg-white rounded">
                    <thead>
                        <tr>
                            <th class="bg-body-secondary" scope="col">id</th>
                            <th class="bg-body-secondary">Nama Hama</th>
                            <th class="bg-body-secondary">Bagian yang Diserang</th>
                            <th class="bg-body-secondary">Ciri Daun</th>
                            <th class="bg-body-secondary">Ciri Akar</th>
                            <th class="bg-body-secondary">Ciri Batang</th>
                            <th class="bg-body-secondary">Ciri Buah</th>
                            <th class="bg-body-secondary">Ciri Bunga</th>
                            <th class="bg-body-secondary">Ciri Khusus</th>
                            <th class="bg-body-secondary">Cara Mengatasi</th>
                            <th class="bg-body-secondary">Gambar</th>
                            <th class="bg-body-secondary">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($hama as $h) : ?>
                            <tr>
                                <td scope="row"><?= $no++; ?></td>
                                <td><?= $h['nama_hama']; ?></td>
                                <td><?= $h['bagian_yang_diserang']; ?></td>
                                <td><?= $h['ciri_daun']; ?></td>
                                <td><?= $h['ciri_akar']; ?></td>
                                <td><?= $h['ciri_batang']; ?></td>
                                <td><?= $h['ciri_buah']; ?></td>
                                <td><?= $h['ciri_bunga']; ?></td>
                                <td><?= $h['ciri_khusus']; ?></td>
                                <td><?= $h['cara_mengatasi']; ?></td>
                                <td>
                                    <img src="<?= base_url('assets/img/fotohama/') . $h['gambar_hama']; ?>" alt="Hama Image" style="width: 100px; height: auto;">
                                </td>
                                <td>
                                    <a href="<?= base_url('user/editHama/') . $h['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <a class="border btn btn-danger" href="<?= base_url('user/deleteHama/') . $h['id']; ?>" onclick="return confirm('Are you sure to delete this?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
