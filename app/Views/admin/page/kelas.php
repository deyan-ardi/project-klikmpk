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
                    <h4>Hai, <?= ucWords(user()->username); ?></h4>
                    <p class="mb-0">Ingin melakukan apa hari ini?</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">KlikMPK</a></li>
                    <li class="breadcrumb-item active"><a
                            href="javascript:void(0)"><?= $d_kelas[0]['nama_kelas']; ?></a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- alert -->
                <?php if ($validation->getError('sampul')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->getError('sampul'); ?>
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
                            <?php if (empty($d_kelas[0]['sampul_kelas'])) : ?>
                            <img src="<?= base_url(); ?>/sampul_image/cover.jpg" class="cover-photo"></img>
                            <?php else : ?>
                            <img src="<?= base_url(); ?>/sampul_image/<?= $d_kelas[0]['sampul_kelas']; ?>"
                                class="cover-photo"></img>
                            <?php endif; ?>
                        </div>
                        <div class="profile-info">
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?= $d_kelas[0]['mata_kuliah']; ?></h4>
                                    <p>Semester <?= $d_kelas[0]['semester']; ?></p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0"><?= $d_kelas[0]['nama_kelas']; ?>
                                    </h4>
                                    <p><?= $total_per_kelas; ?> Orang Mahasiswa</p>
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
                                        <li class="dropdown-item"><a
                                                href="<?= base_url(); ?>/hapus-kelas/<?= $d_kelas[0]['id_kelas']; ?>"
                                                class="tombol-hapus"><i class="fa fa-trash text-primary mr-2"></i> Hapus
                                                Kelas</li></a>
                                        <li class="dropdown-item"><i class="fa fa-image text-primary mr-2"><a href="#"
                                                    data-toggle="modal" data-target="#ubahSampul"></i>
                                            Ubah Foto Sampul</a></li>
                                        <li class="dropdown-item"><a href="#" data-toggle="modal"
                                                data-target="#ubahKelas"><i class="fa fa-edit text-primary mr-2"></i>
                                                Ubah
                                                Kelas</a>
                                        </li>
                                    </ul>
                                    <!-- Ubah Kelas -->
                                    <div class="modal fade" id="ubahKelas">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Kelas</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nama Kelas</label>
                                                            <input type="text"
                                                                value="<?= (old('nama_kelas')) ? old('nama_kelas') : $d_kelas[0]['nama_kelas']; ?>"
                                                                class="form-control" name="nama_kelas"
                                                                placeholder="Nama Kelas">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Mata Kuliah</label>
                                                            <input type="text"
                                                                value="<?= (old('matkul')) ? old('matkul') : $d_kelas[0]['mata_kuliah']; ?>"
                                                                class="form-control" name="matkul"
                                                                placeholder="Nama Mata Kuliah">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Semester</label>
                                                            <input type="number"
                                                                value="<?= (old('semester')) ? old('semester') : $d_kelas[0]['semester']; ?>"
                                                                min="1" max="16" name="semester" class="form-control"
                                                                placeholder="Semester">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" value="submit_kelas"
                                                                name="submit_kelas"
                                                                class="btn btn-primary">UNGGAH</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ubah Kelas -->

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
                                    <li class="nav-item"><a href="#keseluruhan" data-toggle="tab"
                                            class="nav-link active show">Nilai Keseluruhan</a>
                                    </li>
                                    <li class="nav-item"><a href="#sikap" data-toggle="tab" class="nav-link">Nilai Sikap
                                            dan Partisipasi</a>
                                    </li>
                                    <li class="nav-item"><a href="#tugas" data-toggle="tab" class="nav-link">Nilai
                                            Tugas</a>
                                    </li>
                                    <li class="nav-item"><a href="#uts" data-toggle="tab" class="nav-link">Nilai
                                            UTS</a>
                                    </li>
                                    <li class="nav-item"><a href="#uas" data-toggle="tab" class="nav-link">Nilai UAS</a>
                                    </li>
                                    <?php if (!empty($d_kelas[0]['tautan'])) : ?>
                                    <li>
                                        <div class="dropdown mr-auto">
                                            <a href="#" class="btn btn-warning light sharp" data-toggle="dropdown"
                                                aria-expanded="true"><i class="fa fa-lock text-primary mr-2"></i>
                                                Dibagikan</a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-item"><a href="#" data-toggle="modal"
                                                        data-target="#urlBagikan"><i
                                                            class="fa fa-link text-primary mr-2"></i> Salin Tautan</li>
                                                <li class="dropdown-item"><a
                                                        href="<?= base_url(); ?>/berhenti-membagikan/<?= $d_kelas[0]['id_kelas']; ?>"><i
                                                            class="fa fa-stop-circle text-primary mr-2"></i> Berhenti
                                                        Bagikan
                                                </li>
                                                </a>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="tab-content">
                                    <?= $this->include('admin/page/table_keseluruhan'); ?>
                                    <?= $this->include('admin/page/table_tugas'); ?>
                                    <?= $this->include('admin/page/table_uts'); ?>
                                    <?= $this->include('admin/page/table_uas'); ?>
                                    <?= $this->include('admin/page/table_sikap'); ?>
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


<!-- URL Bagikan-->
<div class="modal fade" id="urlBagikan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bagikan Detail Nilai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?= csrf_field(); ?>

                <div class="form-group">
                    <label class="text-black font-w500">Tautan Bagikan</label>
                    <input type="text" id="salin-text" class="form-control" readonly
                        value="<?= base_url(); ?>/b/<?= $d_kelas[0]['tautan']; ?>" required name="tautan">
                </div>
                <label class="text-black font-w500">Dengan membagikan tautan ini, maka siapapun yang memiliki tautan
                    ini memiliki hak akses untuk melihat nilai yang dibagikan dari kelas ini</label>
                <div class="form-group mt-3">
                    <button type="button" id="btn-click" onclick="copy_text()" class="btn btn-dark">Salin
                        Tautan</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End URL Bagikan-->
<?php $this->endSection() ?>