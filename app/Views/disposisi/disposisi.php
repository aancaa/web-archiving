<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-10">

            <h3 class="h3 text-gray-800 mb-3">Daftar Disposisi Surat</h3>

            <!-- Flash data -->

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="/tambahdispo" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="col my-auto">
                            <a href="/suratmasuk" class="float-right btn btn-warning mr-2"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tujuan</th>
                                    <th>Sifat</th>
                                    <th>Batas Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($surat as $s) : ?>
                                    <tr>
                                        <td scope="row"><?= $i++; ?></td>
                                        <td><?= $s['kepada'] ?></td>
                                        <td><?= $s['sifat'] ?></td>
                                        <td><?= $s['batas_tgl'] ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-fw fa-list"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="#" class="dropdown-item">Detail disposisi</a>
                                                    <a href="/disposisi/hapus/<?= $s['id']; ?>" class="dropdown-item">Hapus</a>
                                                    <a data-target="#myModal" data-toggle="modal" href="#myModal" class="dropdown-item">Modal</a>
                                                </div>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <form action="/disposisi/hapus/<?= $s['id']; ?>" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </tr>
                                    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>