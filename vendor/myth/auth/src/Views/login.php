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
                                   <h4 class="text-center mb-4">Masuk Ke KlikMPK</h4>
                                   <?= view('Myth\Auth\Views\_message_block') ?>
                                   <form action="<?= site_url('login') ?>" method="post">
                                       <?= csrf_field() ?>
                                       <?php if ($config->validFields === ['email']) : ?>
                                       <div class="form-group">
                                           <label class="mb-1"><strong><?= lang('Auth.email') ?></strong></label>
                                           <input type="email" name="login"
                                               class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                               placeholder="<?= lang('Auth.email') ?>">
                                           <div class="invalid-feedback">
                                               <?= session('errors.login') ?>
                                           </div>
                                       </div>
                                       <?php else : ?>
                                       <div class="form-group">
                                           <label class="mb-1"><strong><?= lang('Auth.email') ?></strong></label>
                                           <input type="text" name="login"
                                               class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                               placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                           <div class=" invalid-feedback">
                                               <?= session('errors.login') ?>
                                           </div>
                                       </div>
                                       <?php endif; ?>
                                       <div class="form-group">
                                           <label class="mb-1"><strong>Kata Sandi</strong></label>
                                           <input type="password" name="password"
                                               class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                               placeholder="**********">
                                           <div class="invalid-feedback">
                                               <?= session('errors.password') ?>
                                           </div>
                                       </div>
                                       <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                           <?php if ($config->allowRemembering) : ?>
                                           <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
                                                   <input type="checkbox" class="custom-control-input" name="remember"
                                                       id="basic_checkbox_1" <?php if (old('remember')) : ?> checked
                                                       <?php endif ?>>>
                                                   <label class="custom-control-label" for="basic_checkbox_1">Ingat
                                                       Saya</label>
                                               </div>
                                           </div>
                                           <?php endif; ?>
                                           <?php if ($config->activeResetter) : ?>
                                           <div class="form-group">
                                               <a href="<?= site_url('forgot') ?>">Lupa
                                                   Kata Sandi?</a>
                                           </div>
                                           <?php endif; ?>
                                       </div>
                                       <div class="text-center">
                                           <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                       </div>
                                   </form>
                                   <?php if ($config->allowRegistration) : ?>
                                   <div class="new-account mt-3">
                                       <p>Tidak Punya Akun? <a class="text-primary"
                                               href="<?= site_url('register') ?>">Buat Akun</a></p>
                                   </div>
                                   <?php endif; ?>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php $this->endSection(); ?>