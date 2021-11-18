<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-5">
            <div class="card my-5">
                <div class="card-body">
                    <div class="p-5">
                        <h4 class="text-center text-gray-800">welcome back!</h4>
                        <form action="/auth/login" method="POST" id="form_login" class="mt-5">
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
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control rounded-pill lh-lg" placeholder="password" id="password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill w-100 lh-lg">Login</button>
                        </form>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="/auth/register">Register</a>
                            <a href="/auth/forgot-password">Forgot password?</a>
                        </div>
                        <div class="dropdown-divider my-3"></div>
                        <button class="btn btn-danger rounded-pill w-100 lh-lg">
                            <i class="fab fa-google fa-fw"></i> Google
                        </button>
                        <button class="btn btn-facebook rounded-pill w-100 lh-lg mt-3">
                            <i class="fab fa-facebook fa-fw"></i> Facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>