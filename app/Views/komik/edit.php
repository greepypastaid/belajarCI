<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Data Komik</h2>
            <form action="/komik/update/<?= $komik['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">
                <div class="form-group row my-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control <?= isset($errors['judul']) ? 'is-invalid' : ''; ?>" id="judul" placeholder="Judul Komik" autofocus value="<?= $komik['judul']; ?>">
                        <div class="invalid-feedback">
                            <?= $errors['judul'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" name="penulis" class="form-control <?= isset($errors['penulis']) ? 'is-invalid' : ''; ?>" id="penulis" placeholder="Penulis Komik" value="<?= $komik['penulis']; ?>">
                        <div class="invalid-feedback">
                            <?= $errors['penulis'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" class="form-control <?= isset($errors['penerbit']) ? 'is-invalid' : ''; ?>" id="penerbit" placeholder="Penerbit Komik" value="<?= $komik['penerbit']; ?>">
                        <div class="invalid-feedback">
                            <?= $errors['penerbit'] ?? ''; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="/img/<?= $komik['sampul']; ?>" class="img-thumbnail img-preview" alt="Sampul <?= $komik['judul']; ?>">
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control <?= isset($errors['sampul']) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul">
                                <div class="invalid-feedback">
                                    <?= $errors['sampul'] ?? ''; ?>
                                </div>
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah sampul</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?= $this->endSection() ?>