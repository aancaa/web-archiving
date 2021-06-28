<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h3 text-gray-800">Disposisi - Surat Masuk</h3>
            <form action="/suratmasuk/disposisi/<?= $surat['id']; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row mt-4">
                    <div class="col">

                        <input type="hidden" name="sm_id" value="20">
                        <div class="form-group">
                            <label for="kepada">Diteruskan Kepada : </label>
                            <input type="text" class="form-control border-left-primary" value="<?= $surat['kepada']; ?>" readonly="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan Disposisi</label>
                            <input type="text" class="form-control border-left-primary" value="<?= $surat['tujuan']; ?>" readonly="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prihal">Prihal</label>
                            <input type="text" class="form-control border-left-primary" value="<?= $surat['prihal']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="batas_tgl">Waktu Disposisi</label>
                            <input type="text" class="form-control border-left-primary" value="<?= $surat['batas_tgl']; ?>" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="sifat">Sifat</label>
                            <input type="text" class="form-control border-left-primary" value="<?= $surat['sifat']; ?>" readonly="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <a href="/suratmasuk" class="float-right btn btn-warning mr-2" style="margin-left:10pt;">Kembali</a>
                            <a href="/suratmasuk/form_disposisi/<?= $surat['id']; ?>" class="float-right btn btn-secondary" style="margin-left:10pt;">Ubah Disposisi</a>
                            <a href="/suratmasuk/htmlToPDF/<?= $surat['id']; ?>" class="float-right btn btn-primary" style="margin-left:10pt;">Print</a>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<br>
<br>
<?= $this->endSection(); ?>