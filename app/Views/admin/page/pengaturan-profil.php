<?php $this->extend('admin/master/master-dashboard') ?>
<?php $this->section('main') ?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hai, <?= ucWords(user()->username); ?>!</h4>
                    <p class="mb-0">Ubah informasi profilmu disini</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">KlikMPK</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil Saya</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- alert -->
                <?php if ($validation->getError('profil') || $validation->getError('sampul')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if ($validation->getError('profil')) : ?>
                    <?= $validation->getError('profil'); ?>
                    <?php else : ?>
                    <?= $validation->getError('sampul'); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if ($validation->getErrors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors(); ?>
                </div>
                <?php endif; ?>

                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <?php if (empty(user()->foto_sampul)) : ?>
                            <img src="<?= base_url(); ?>/sampul_image/cover.jpg" class="cover-photo"></img>
                            <?php else : ?>
                            <img src="<?= base_url(); ?>/sampul_image/<?= user()->foto_sampul; ?>"
                                class="cover-photo"></img>
                            <?php endif; ?>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <?php if (empty(user()->foto_profil)) : ?>
                                <img src="<?= base_url(); ?>/profil_image/default.jpg" class="img-fluid rounded-circle"
                                    alt="">
                                <?php else : ?>
                                <img src="<?= base_url(); ?>/profil_image/<?= user()->foto_profil; ?>"
                                    class="img-fluid rounded-circle" alt=""></img>
                                <?php endif; ?>
                            </div>
                            <div class=" profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?= ucWords(user()->username); ?></h4>
                                    <p>Dosen/Guru Pendidik</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0"><?= user()->email; ?></h4>
                                    <p>Sedang Aktif</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                        aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item"><a href="#" data-toggle="modal"
                                                data-target="#ubahFoto"><i
                                                    class="fa fa-user-circle text-primary mr-2"></i>
                                                Ubah Foto Profil</a></li>
                                        <li class="dropdown-item"><i class="fa fa-image text-primary mr-2"><a href="#"
                                                    data-toggle="modal" data-target="#ubahSampul"></i>
                                            Ubah Foto Sampul</a></li>
                                    </ul>
                                    <!-- Ubah Profil -->
                                    <div class="modal fade" id="ubahFoto">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ganti Foto Profil</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Unggah Profil</label>
                                                            <input type="file" name="profil" required
                                                                class="form-control" accept=".jpg,.png,.jpeg">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" value="submit_profil"
                                                                name="submit_profil"
                                                                class="btn btn-primary">UNGGAH</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ubah Profil -->

                                    <!-- Ubah Sampul -->
                                    <div class="modal fade" id="ubahSampul">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ganti Foto Sampul</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Unggah Sampul</label>
                                                            <input type="file" class="form-control"
                                                                accept=".jpg,.png,.jpeg" required name="sampul">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" value="submit_sampul"
                                                                name="submit_sampul"
                                                                class="btn btn-primary">UNGGAH</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ubah Sampul -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                            class="nav-link active show">Tentang Saya</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                            class="nav-link">Setelan Akun</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="about-me" class="tab-pane fade active show">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Cerita Singkat</h4>
                                                <?php if (!empty(user()->deskripsi)) : ?>
                                                <p class="mb-2"><?= ucWords(user()->deskripsi); ?></p>
                                                <?php else : ?>
                                                <p class="mb-2"><em> Deskripsi Diri Belum Disetel</p>
                                                <?php endif; ?></em>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Profil Saya</h4>
                                                <form action="" method="POST">
                                                    <?= csrf_field(); ?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" name="email"
                                                                placeholder="Hello@mail.com"
                                                                value="<?= (old('email')) ? old('email') : user()->email; ?>"
                                                                class="form-control <?php if ($validation->getError('email')) : ?>is-invalid<?php endif ?>"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('email'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Nama Pengguna</label>
                                                            <input type="text" name="name"
                                                                value="<?= (ucwords(old('name'))) ? ucwords(old('name')) : ucwords(user()->username); ?>"
                                                                placeholder=" Nama Pengguna"
                                                                class="form-control <?php if ($validation->getError('name')) : ?>is-invalid<?php endif ?>"
                                                                required>
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('name'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Kata Sandi Baru (Jika Ingin Diganti)</label>
                                                            <input type="password" name="password"
                                                                placeholder="********" value="<?= old('password') ?>"
                                                                class="form-control <?php if ($validation->getError('password')) : ?>is-invalid<?php endif ?>">
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('password'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Konfirmasi Kata Sandi (Jika Ingin Diganti)</label>
                                                            <input type="password" name="re-password"
                                                                placeholder="********" value="<?= old('re-password') ?>"
                                                                class="form-control <?php if ($validation->getError('re-password')) : ?>is-invalid<?php endif ?>">
                                                            <div class="invalid-feedback">
                                                                <?= $validation->getError('re-password'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cerita Singkat</label>
                                                        <textarea id="description"
                                                            class="form-control <?php if ($validation->getError('description')) : ?>is-invalid<?php endif ?>"
                                                            cols="30" rows="5" placeholder="Deskripsikan Diri Anda"
                                                            name="description"
                                                            required><?= (old('description')) ? old('description') : user()->deskripsi; ?></textarea>
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('description'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="logout" value="1"
                                                                class="custom-control-input" id="gridCheck">
                                                            <label class="custom-control-label" for="gridCheck">Login
                                                                Ulang</label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" name="submit" value="submit"
                                                        type="submit">Simpan Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="replyModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Post Reply</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <textarea class="form-control" rows="4">Message</textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php $this->endSection() ?>