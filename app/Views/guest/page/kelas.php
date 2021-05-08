<?php $this->extend('guest/master/master-dashboard') ?>
<?php $this->section('main') ?>
<!--**********************************
            Content body start
        ***********************************-->

<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
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
                                <h4 class="text-primary mb-0"><?= ucWords($d_kelas[0]['mata_kuliah']); ?></h4>
                                <p>Semester <?= $d_kelas[0]['semester']; ?></p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0"><?= ucWords($d_kelas[0]['nama_kelas']); ?>
                                </h4>
                                <p><?= $total_per_kelas; ?> Orang Mahasiswa</p>
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
                                <?php if (!empty($d_kelas)) : ?>
                                <?php if ($d_kelas[0]['n_seluruh'] == 1) : ?>
                                <li class="nav-item"><a href="#keseluruhan" data-toggle="tab"
                                        class="nav-link active show">Nilai Keseluruhan</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($d_kelas[0]['n_sikap'] == 1) : ?>
                                <li class="nav-item"><a href="#sikap" data-toggle="tab" class="nav-link">Nilai Sikap
                                        dan Partisipasi</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($d_kelas[0]['n_tugas'] == 1) : ?>
                                <li class="nav-item"><a href="#tugas" data-toggle="tab" class="nav-link">Nilai
                                        Tugas</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($d_kelas[0]['n_uts'] == 1) : ?>
                                <li class="nav-item"><a href="#uts" data-toggle="tab" class="nav-link">Nilai
                                        UTS</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($d_kelas[0]['n_uas'] == 1) : ?>
                                <li class="nav-item"><a href="#uas" data-toggle="tab" class="nav-link">Nilai UAS</a>
                                </li>
                                <?php endif; ?>

                                <?php endif; ?>
                            </ul>
                            <div class="tab-content">
                                <?= $this->include('guest/page/table_keseluruhan'); ?>
                                <?= $this->include('guest/page/table_tugas'); ?>
                                <?= $this->include('guest/page/table_uts'); ?>
                                <?= $this->include('guest/page/table_uas'); ?>
                                <?= $this->include('guest/page/table_sikap'); ?>
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