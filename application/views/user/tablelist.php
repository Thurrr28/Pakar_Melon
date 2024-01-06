<div class="row">
    <div class="container">
        <div class="container-fluid card">
            <h1 class="h3 mb-4 mt-2 text-gray-800"><?= $title ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <nav class="navbar navbar-inverse position-absolute top-0 end-0">
            </nav>
            <table class="table-bordered table table-hover text-center border shadow-sm p-3 mb-5 bg-white rounded">
                <tr>
                    <th class="bg-body-secondary" scope="col">id</th>
                    <th class="bg-body-secondary">Program Studi</th>
                    <th class="bg-body-secondary">Kode</th>
                    <th class="bg-body-secondary">Mata Kuliah</th>
                    <th class="bg-body-secondary">SKS</th>
                    <th class="bg-body-secondary">Deskripsi</th>
                    <th class="bg-body-secondary">Semester</th>
                    <th class="bg-body-secondary">Action</th>
                </tr>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($datarps as $mhs) : ?>
                        <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td><?= $mhs['program_studi']; ?></td>
                            <td><?= $mhs['kode']; ?></td>
                            <td><?= $mhs['mata_kuliah']; ?></td>
                            <td><?= $mhs['sks']; ?></td>
                            <td><?= $mhs['deskripsi']; ?></td>
                            <td><?= $mhs['semester']; ?></td>
                            <td>
                                <a class="border btn btn-primary" href="<?= base_url('user/view/') . $mhs['id_rps']; ?>"><i class="bi bi-eye"></i>
                                </a>
                                <a class="border btn btn-warning" href="<?= base_url('user/tablemateri/') . $mhs['id_rps']; ?>"><i class="bi bi-card-list"></i>
                                </a>
                                <a class="border btn btn-danger" href="<?= base_url('user/delete/') . $mhs['id_rps']; ?>" onclick="return confirm('Are you sure to delete this?')"><i class="bi bi-trash"></i>
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