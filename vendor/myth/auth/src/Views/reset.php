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
                                <h4 class="text-center mb-4">Reset Kata Sandi KlikMPK</h4>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= site_url('reset-password') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Token</strong></label>
                                        <input type="text" type="text"
                                            class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>"
                                            name="token" placeholder="<?= lang('Auth.token') ?>"
                                            value="<?= old('token', $token ?? '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.token') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email"
                                            class="form-control<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                            name="email" aria-describedby="emailHelp" placeholder="hello@example.com"
                                            value="<?= old('email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Kata Sandi Baru</strong></label>
                                        <input type="password"
                                            class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            name="password" placeholder="********">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Konfirmasi Kata Sandi Baru</strong></label>
                                        <input type="password"
                                            class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                            name="pass_confirm" placeholder="********">
                                        <div class="invalid-feedback">
                                            <?= session('errors.pass_confirm') ?>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan Kata
                                            Sandi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>