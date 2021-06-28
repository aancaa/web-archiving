<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="col-12 mb-4">
    <h3 class="judul h3 text-gray-800">Tambah Surat Masuk</h3>
    <form action="/suratmasuk/save" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="row mt-4">
            <div class="col">
                <input type="hidden" name="id">
                <div class="form-group">
                    <label for="no_sm">No. Surat</label>
                    <input type="text" name="no_sm" id="no_sm" class="form-control border-left-primary <?= ($validation->hasError('no_sm')) ? 'is-invalid' : ''; ?>" value="<?= old('no_sm'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_sm'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl_sm">Tanggal Surat</label>
                    <input type="date" name="tgl_sm" id="tgl_sm" class="form-control border-left-primary <?= ($validation->hasError('tgl_sm')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_sm'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_sm'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl_terima_sm">Tanggal Diterima</label>
                    <input type="date" name="tgl_terima_sm" id="tgl_terima_sm" class="form-control border-left-primary <?= ($validation->hasError('tgl_terima_sm')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_terima_sm'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_terima_sm'); ?>
                    </div>
                </div>
            </div>
            <div class="col">
                
                <div class="form-group">
                    <label for="pengirim">Pengirim</label>
                    <input type="text" name="pengirim" id="pengirim" class="form-control border-left-primary <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" value="<?= old('pengirim'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('pengirim'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ktr_sm">Prihal</label>
                    <input type="text" name="ktr_sm" id="ktr_sm" class="form-control border-left-primary " value="<?= old('ktr_sm'); ?>">
                </div>
                <div class="form-group">
                    <label for="file">Upload File</label>
                    <div class="custom-file">
                        <input type="file" name="file" id="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" onchange="previewFile()" value="<?= old('file'); ?>">
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
                    <a href="/suratmasuk" class="float-right btn btn-warning mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>