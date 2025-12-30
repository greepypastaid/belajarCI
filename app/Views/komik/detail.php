<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h2>Detail Komik</h2>
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-fluid rounded-start"
                            alt="<?= $komik['judul']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text"> <b>Penulis: </b><?= $komik['penulis']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Penerbit:
                                    </b><?= $komik['penerbit']; ?></small></p>
                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/komik/delete/<?= $komik['id']; ?>" method="post" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <?= csrf_field(); ?>
                                <input type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br class="my-4">
                            <a href="/komik" class="btn btn-primary">Kembali ke Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>