<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-10">
                            <h3 class="h3 text-gray-800">Detail Surat Keluar</h3>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sk-12">
                            <div class="form-group">
                                <label>No. Surat</label>
                                <input type="text" class="form-control border-left-primary" value="<?= $surat['no_sk']; ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Penerima</label>
                                <input type="text" class="form-control border-left-primary" value="<?= $surat['penerima']; ?>" readonly="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sk-12">
                            <div class="form-group">
                                <label>Tanggal Surat</label>
                                <input type="text" class="form-control border-left-primary" value="<?= $surat['tgl_sk']; ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Prihal</label>
                                <input type="text" class="form-control border-left-primary" value="<?= $surat['ktr_sk']; ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label>File <a href="/suratkeluar/download/<?= $surat['file']; ?>"><sup>Download</sup></a></label> 
                                <input type="text" class="form-control border-left-danger" value="<?= $surat['file']; ?>" readonly="">
                            </div>
                            <a href="/suratkeluar/edit/<?= $surat['id']; ?>" class="float-right btn btn-primary">Ubah</a>
                            <a href="/suratkeluar" class="float-right btn btn-warning mr-2">Kembali</a>
                        </div>
                    </div>
                </div>

<?= $this->endSection(); ?>
