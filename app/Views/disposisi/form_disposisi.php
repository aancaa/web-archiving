<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h3 text-gray-800">Tambah Disposisi - Surat Masuk</h3>
            <form action="/suratmasuk/disposisi/<?= $surat['id']; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row mt-4">
                    <div class="col">

                        <input type="hidden" name="sm_id" value="20">
                        <div class="form-group">
                            <label for="kepada">Diteruskan Kepada :</label>
                            <select name="kepada" id="kepada" class="form-control shadow-sm border-left-primary">
                                <option></option>
                                <option value="Kordinator Program & PU">Kordinator Program & PU</option>
                                <option value="Kordinator Berita">Kordinator Berita</option>
                                <option value="Kordinator Teknik">Kordinator Teknik</option>
                                <option value="Kordinator Umum">Kordinator Umum</option>
                                <option value="Kordinator Keuangan">Kordinator Keuangan</option>
                                <option value="PPK Bag.Umum & Teknik">PPK Bag.Umum & Teknik</option>
                                <option value="PPK Bid.Program & Berita">PPK Bid.Program & Berita</option>
                                <option value="Sekertaris">Sekertaris</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan Disposisi</label>
                            <select name="tujuan" id="tujuan" class="form-control shadow-sm border-left-primary">
                                <option></option>
                                <option value="Untuk Dilaksanankan">Untuk Dilaksanankan</option>
                                <option value="Untuk Diketahui">Untuk Diketahui</option>
                                <option value="Untuk Diproses">Untuk Diproses</option>
                                <option value="Dibantu/Dipertimbangkan">Dibantu/Dipertimbangkan</option>
                                <option value="Saran/Tanggapan">Saran/Tanggapan</option>
                                <option value="Konsep Jawaban">Konsep Jawaban</option>
                                <option value="File/Arsip">File/Arsip</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prihal">Prihal</label>
                            <textarea name="prihal" id="prihal" cols="30" rows="2" class="form-control border-left-primary shadow-sm"></textarea>
                        </div>


                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="batas_tgl">Waktu Disposisi</label>
                            <input type="date" name="batas_tgl" id="batas_tgl" class="border-left-primary form-control shadow-sm" value="">
                        </div>
                        <div class="form-group">
                            <label for="sifat">Sifat</label>
                            <select name="sifat" id="sifat" class="form-control shadow-sm border-left-primary">
                                <option></option>
                                <option value="Penting">Penting</option>
                                <option value="Segera">Segera</option>
                                <option value="Rahasia">Rahasia</option>
                            </select>
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
                            <button type="submit" class="float-right btn btn-primary"  style="margin-left:10pt;">Tambah Data</button>
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