<?= $this->extend($config->viewLayout) ?>
<?php $this->section('body') ?>
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <img src="<?= base_url(); ?>/assets/klik-icon.png" width="75px" alt="">
                                </div>
                                <h4 class="text-center mb-4">Daftar KlikMPK</h4>

                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= site_url('register') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Username</strong></label>
                                        <input type="text"
                                            class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                            name="username" placeholder="username" value="<?= old('username') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email"
                                            class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                            name="email" aria-describedby="emailHelp" value="<?= old('email') ?>"
                                            placeholder="hello@example.com">
                                        <small id="emailHelp" class="form-text text-muted">Kami tidak akan pernah
                                            membagikan email Anda dengan orang lain. </small>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Kata Sandi</strong></label>
                                        <input type="password" name="password"
                                            class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            autocomplete="off" placeholder="********">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Konfirmasi Kata Sandi</strong></label>
                                        <input type="password" name="pass_confirm"
                                            class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                            autocomplete="off" placeholder="********">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Daftar Akun</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Sudah Punya Akun? <a class="text-primary"
                                            href="<?= site_url('login') ?>">Masuk</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>