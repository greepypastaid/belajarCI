<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-2">Daftar Komik</h1>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($komik as $k) : ?>
                    <tr>
                        <th scope="row">
                            <?= $k['id']; ?>
                        </th>
                        <td><img src="/img/<?= $k['sampul']; ?>" width="100" alt=""></td>
                        <td><?= $k['judul']; ?></td>
                        <td><a href="" class="btn btn-success">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>