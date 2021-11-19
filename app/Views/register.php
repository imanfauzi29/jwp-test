<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-5">
            <div class="card my-5">
                <div class="card-body">
                    <div class="p-5">
                        <h4 class="text-center text-gray-800">Register your account</h4>
                        <form action="/auth/register" method="POST" id="form_login" class="mt-5" enctype="multipart/form-data">
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
                                <div id="profile" class="position-relative rounded-circle overflow-hidden d-flex mx-auto" style="width: 150px; height: 150px">
                                <label>
                                    <img src="<?= base_url("/image/profile-picture.png") ?>" id="image-profile" style="width: 150px;height:150px">
                                    <input type="file" name="profile" id="profile" class="file" accept="image/png, image/jpeg, image/jpg">
                                    <div class="pick_photos"><i class="fa fa-fw fa-camera"></i></div>
                                </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control rounded-pill lh-lg" placeholder="Name" id="name" value="<?= old('name') ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control rounded-pill lh-lg" placeholder="Email" id="email" value="<?= old('email') ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control rounded-pill lh-lg" placeholder="password" id="password" value="<?= old('password') ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill w-100 lh-lg">Register</button>
                        </form>
                        <div class="d-flex justify-content-between mt-3">
                            Sudah punya akun ? <a href="/auth/login">Login</a>
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