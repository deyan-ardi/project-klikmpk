      <?php $this->extend('admin/master/master-dashboard'); ?>

      <?php $this->section('main') ?>
      <!--**********************************
            Content body start
        ***********************************-->
      <div class="content-body">
          <div class="container-fluid">
              <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                  <h3 class="font-w600 mb-2 mr-auto ">Dashboard</h3>
              </div>
              <div class="row">
                  <div class="col-xl-4 col-lg-6 col-sm-6">
                      <div class="widget-stat card">
                          <div class="card-body p-4">
                              <h4 class="card-title">Total Kelas</h4>
                              <h3><?= $tot_kelas; ?></h3>
                              <div class="progress mb-2">
                                  <div class="progress-bar progress-animated bg-primary"
                                      style="width: <?= $tot_kelas ?>%"></div>
                              </div>
                              <small>Update Terakhir <?= date('H:i'); ?> WITA</small>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-sm-6">
                      <div class="widget-stat card">
                          <div class="card-body p-4">
                              <h4 class="card-title">Total Mahasiswa</h4>
                              <h3><?= $tot_mahasiswa; ?></h3>
                              <?php 
                              if($tot_mahasiswa != 0 && $tot_kelas != 0){
                              $persen = ($tot_kelas + $tot_mahasiswa) * 0.05;
                              }else{
                                  $persen = 0;
                              } ?>
                              <div class="progress mb-2">
                                  <div class="progress-bar progress-animated bg-warning" style="width: <?= $persen ?>%">
                                  </div>
                              </div>
                              <small>Update Terakhir <?= date('H:i'); ?> WITA</small>

                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-sm-6">
                      <div class="widget-stat card">
                          <div class="card-body p-4">
                              <h4 class="card-title">Waktu Server</h4>
                              <h3><?= date("l, d F Y") ?></h3>
                              <div class="col-auto col-12 row">
                                  <h4 id="jam"></h4>
                                  <h4 id="menit"></h4>
                                  <h4 id="detik"></h4>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-12 mt-2">
                      <div class="card">
                          <div class="card-header d-sm-flex d-block pb-0 border-0">
                              <div>
                                  <h4 class="fs-20 text-black">Selamat Datang, <?= ucWords(user()->username); ?></h4>
                                  <h6 class="mb-0 fs-12 text-justify">Selamat datang di Sistem Informasi KlikMPK.
                                      KlikMPK adalah
                                      Sistem Informasi Berbasis Website yang digunakan untuk memberikan penilaian secara
                                      lebih terperinci kepada mahasiswa utamanya pada penilaian afektif. Pada Sistem
                                      Informasi ini, Aspek-Aspek penilaian dari Mahasiswa utamanya pada penilaian
                                      afektif telah diberikan dan dapat dijadikan sebagai acuan dalam pengisian
                                      penilaian pada SIAK Undiksha. Untuk dapat memulai membuat penilaian, silahkan buat
                                      kelas terlebih dahulu. Selamat menggunakan Sistem Informasi ini <br><br><br>
                                      ~ Administrator
                                  </h6>
                              </div>
                          </div>
                          <div class="card-body">

                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-head mb-sm-5 mt-3 d-flex flex-wrap align-items-center">
                  <h3 class="font-w600 mb-2 mr-auto ">Kelas Saya</h3>
                  <a href="#" data-toggle="modal" data-target="#tambahKelas"
                      class="btn btn-secondary text-white mb-2"><i class="las la-plus-square scale5 mr-3"></i>Buat
                      Kelas</a>
                  <!-- Tambah Kelas -->
                  <div class="modal fade" id="tambahKelas">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Tambah Kelas Baru</h5>
                                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="" method="POST">
                                      <div class="form-group">
                                          <label class="text-black font-w500">Nama Kelas</label>
                                          <input type="text" value="<?= old('nama_kelas'); ?>" class="form-control"
                                              name="nama_kelas" required placeholder="Nama Kelas">
                                      </div>
                                      <div class="form-group">
                                          <label class="text-black font-w500">Mata Kuliah</label>
                                          <input type="text" value="<?= old('matkul'); ?>" class="form-control"
                                              name="matkul" required placeholder="Nama Mata Kuliah">
                                      </div>
                                      <div class="form-group">
                                          <label class="text-black font-w500">Semester</label>
                                          <input type="number" value="<?= (old('semester')) ? old('semester') : "1"; ?>"
                                              min="1" max="16" name="semester" class="form-control" required
                                              placeholder="Semester">
                                      </div>
                                      <div class="form-group">
                                          <button type="submit" value="submit_kelas" name="submit_kelas"
                                              class="btn btn-primary">UNGGAH</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End Tambah Kelas -->
              </div>
              <!-- alert -->
              <?php if ($validation->getErrors()) : ?>
              <div class="alert alert-danger mb-3" role="alert">
                  <?= $validation->listErrors(); ?>
              </div>
              <?php endif; ?>
              <div class="row">
                  <div class="col-xl-6 col-xxl-12">
                      <div class="row">
                          <?php if (!empty($kelas)) : ?>
                          <?php foreach ($kelas as $d) : ?>
                          <div class="col-xl-4 col-lg-12 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="text-center p-3 overlay-box "
                                      style="background-image: url(<?= base_url(); ?>/sampul_image/img1.jpg);">
                                      <h3 class="mt-3 mb-1 text-white"><?= $d['nama_kelas']; ?></h3>
                                      <?php 
                                      $i = 0;
                                      foreach($get_all_mahasiswa as $mhs){
                                          if($mhs['id_kelas'] == $d['id_kelas']){
                                            $i++;
                                          }
                                      }
                                        ?>

                                      <p class="text-white mb-0"><?= $i; ?> Mahasiswa</p>

                                      <?php $i = 0; ?>
                                  </div>
                                  <ul class="list-group list-group-flush">
                                      <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Mata
                                              Kuliah</span> <strong class="text-muted"><?= $d['mata_kuliah']; ?>
                                          </strong></li>
                                      <li class="list-group-item d-flex justify-content-between"><span
                                              class="mb-0">Semester</span> <strong
                                              class="text-muted"><?= $d['semester']; ?></strong>
                                      </li>
                                  </ul>
                                  <div class="card-footer border-0 mt-0">
                                      <a href="<?= base_url(); ?>/masuk-kelas/<?= $d['id_kelas']; ?>"><button
                                              class="btn btn-primary btn-lg btn-block">
                                              <i class="las la-sign-in-alt scale5 mr-3"></i> Masuk Kelas
                                          </button></a>
                                  </div>
                              </div>
                          </div>
                          <?php endforeach; ?>
                          <?php else : ?>
                          <div class="col-xl-12">
                              <div class="alert alert-danger" role="alert">
                                  <p class="text-center">Belum Ada Kelas Yang Dibuat</p>
                              </div>
                          </div>
                          <?php endif; ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--**********************************
            Content body end
        ***********************************-->
      <?php $this->endSection(); ?>