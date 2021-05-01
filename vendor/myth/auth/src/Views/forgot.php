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
                                <h4 class="text-center mb-4">Lupa Kata Sandi KlikMPK</h4>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= site_url('forgot') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email"
                                            class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                            name="email" aria-describedby="emailHelp" placeholder="hello@example.com">
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Kirim Email
                                            Verifikasi</button>
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