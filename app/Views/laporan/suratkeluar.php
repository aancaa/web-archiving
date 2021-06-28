<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Judul & Card -->
    <div class="row">
        <div class="col-12">

            <h3 class="h3 text-gray-800">Laporan - Surat Keluar</h3>

        </div>
    </div>

    <br>
    
    <div class="card">
    <div class="card-header">
        <form action="<?= base_url('suratkeluar/printexcel') ?>" method="post">
                <div class="form-row">
                    <div class=" col-lg-1 ">
                        <button type="submit" name="excel" class="btn btn-outline-success shadow-sm btn-block" >Excel</button>
                    </div>
                </div>
        </form>
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
                    <?php $i = 1 ?>
                    <?php foreach ($surat as $s) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?= $s['no_sk'] ?></td>
                            <td><?= $s['penerima'] ?></td>
                            <td><?= $s['tgl_sk'] ?></td>
                            <td>
                            <td>
                                <a href="/suratkeluardetail/<?= $s['id']; ?>" target="_blank" class="btn btn-sm btn-success">Detail</a>
                            </td>
                            </td>
                        </tr>
                        <!-- Modal -->
                    
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('tbl_sk', 'surat_pagination'); ?>
        </div>
    </div>

</div>
<br><br><br><br><br><br><br>
<?= $this->endSection(); ?>