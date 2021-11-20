<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-5">
            <div class="card my-5">
                <div class="card-body">
                    <div class="p-5">
                        <h4 class="text-center text-gray-800">Masukan email anda</h4>
                        <form action="/auth/forgot-password" method="POST" id="form_login" class="mt-5">
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control rounded-pill lh-lg" placeholder="Email" id="email">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill w-100 lh-lg">Check</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>