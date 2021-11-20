<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="container">
<?php if (!session()->getFlashdata('expired')) : ?>
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-5">
            <div class="card my-5">
                <div class="card-body">
                    <div class="p-5">
                        <h4 class="text-center text-gray-800">Masukan password baru</h4>
                        <form id="form_login" class="mt-5" method="POST">
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control rounded-pill lh-lg" placeholder="Password" id="password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill w-100 lh-lg">Reset password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php else: ?>
        <p>Token is expired <a href="/">go back</a></p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>