<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar - Surat Masuk</h1>
    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Surat Berhasil <strong><?= session()->getFlashdata('pesan'); ?></strong>
        </div>
    <?php endif; ?>



    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger' role='alert'>" . session()->get('err') . "</div>";
            }
            ?>
        </div>
    </div>



    <div class="card">
        <div class="card-header">
            <a href="/tambah_sm" class="btn btn-primary shadow-sm"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Surat</th>
                        <th>Pengirim</th>
                        <th>Tanggal Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                    <?php foreach ($surat as $s) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?= $s['no_sm'] ?></td>
                            <td><?= $s['pengirim'] ?></td>
                            <td><?= $s['tgl_sm'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-list"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="/suratmasukdetail/<?= $s['id']; ?>" class="dropdown-item">Detail</a>
                                        <a href="/suratmasuk/delete/<?= $s['id']; ?>" class="dropdown-item">Hapus</a>
                                        <a href="/dispo/<?= $s['id']; ?>" class="dropdown-item">Disposisi</a>
                                        <!-- <a data-target="#myModal" data-toggle="modal" href="#myModal" class="dropdown-item">Modal</a> -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <form action="/suratmasuk/delete/<?= $s['id']; ?>" method="post">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <a href="/suratmasuk/delete/<?= $s['id']; ?>" class="dropdown-item">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('disposisi_sm', 'surat_pagination'); ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->
</script>
<?= $this->endSection(); ?>