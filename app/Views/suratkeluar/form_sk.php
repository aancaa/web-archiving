<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-12 mb-4">
    <h3 class="judul h3 text-gray-800">Tambah Surat Keluar</h3>
    <form action="/suratkeluar/save" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="row mt-4">
            <div class="col">
                <input type="hidden" name="id">
                <div class="form-group">
                    <label for="no_sk">No. Surat</label>
                    <input type="text" name="no_sk" id="no_sk" class="form-control border-left-primary <?= ($validation->hasError('no_sk')) ? 'is-invalid' : '';?>" value="<?= old('no_sk'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_sk'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="penerima">Penerima</label>
                    <input type="text" name="penerima" id="penerima" class="form-control border-left-primary <?= ($validation->hasError('penerima')) ? 'is-invalid' : '';?>" value="<?= old('penerima'); ?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('penerima'); ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tgl_sk">Tanggal Surat</label>
                    <input type="date" name="tgl_sk" id="tgl_sk" class="form-control border-left-primary <?= ($validation->hasError('tgl_sk')) ? 'is-invalid' : '';?>" value="<?= old('tgl_sk'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_sk'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ktr_sk">Prihal</label>
                    <input type="text" name="ktr_sk" id="ktr_sk" class="form-control border-left-primary " value="<?= old('ktr_sk'); ?>">
                </div>
                <div class="form-group">
                    <label for="file">Upload File</label>
                    <div class="custom-file">
                        <input type="file" name="file" id="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : '';?>" id="file" onchange="previewFile()" value="<?= old('file'); ?>">
                        <label class="custom-file-label" for="file">Choose file</label>
                        <small class="text-sm text-info">Format file yang diizinkan .jpg, .png, .pdf dan ukuran maks 2 MB!</small>
                        <div class="invalid-feedback">
                        <?= $validation->getError('file'); ?>
                    </div>
                    </div>
                </div>
                <!-- User Saved -->
                <input type="hidden" name="user_id" value="1">
                <div class="form-group">
                    <button type="submit" class="float-right btn btn-primary">Tambah Data</button>
                    <a href="/suratkeluar" class="float-right btn btn-warning mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>