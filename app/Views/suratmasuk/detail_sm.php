<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-10">
            <h3 class="h3 text-gray-800">Detail Surat Masuk</h3>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label>No. Surat</label>
                <input type="text" class="form-control border-left-primary" value="<?= $surat['no_sm']; ?>" readonly="">
            </div>
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="text" class="form-control border-left-primary" value="<?= $surat['tgl_sm']; ?>" readonly="">
            </div>
            <div class="form-group">
                <label>Tanggal Diterima</label>
                <input type="text" class="form-control border-left-primary" value="<?= $surat['tgl_terima_sm']; ?>" readonly="">
            </div>
            
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label>Pengirim</label>
                <input type="text" class="form-control border-left-primary" value="<?= $surat['pengirim']; ?>" readonly="">
            </div>
            <div class="form-group">
                <label>Prihal</label>
                <input type="text" class="form-control border-left-primary" value="<?= $surat['ktr_sm']; ?>" readonly="">
            </div>
            <div class="form-group">
                <label>File <a href="/suratmasuk/download/<?= $surat['file']; ?>"><sup>Download</sup></a></label>
                <input type="text" class="form-control border-left-danger" value="<?= $surat['file']; ?>" readonly="">
            </div>
            
        </div>
        <br>
        <div></div>
        <!-- <a href="/dispo/<?= $surat['id']; ?>" class="float-right btn btn-secondary" style="margin-left:620pt;">Disposisi</a> -->
        <a href="/suratmasuk/edit/<?= $surat['id']; ?>" class="float-right btn btn-primary" style="margin-left:10pt;">Ubah</a>
        <a href="/suratmasuk" class="float-right btn btn-warning mr-2" style="margin-left:10pt;">Kembali</a>
    </div>

</div>
<br>
<br>
<?= $this->endSection(); ?>