      <?php $this->extend('admin/master/master-dashboard'); ?>

      <?php $this->section('main') ?>
      <!--**********************************
            Content body start
        ***********************************-->
      <div class="content-body">
          <div class="container-fluid">
              <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                  <h3 class="font-w600 mb-2 mr-auto ">Informasi Website</h3>
              </div>
              <div class="row">
                  <div class="col-xl-12 mt-2">
                      <div class="card">
                          <div class="card-header d-sm-flex d-block pb-0 border-0">
                              <div>
                                  <h4 class="fs-20 text-black">Hai, <?= ucWords(user()->username); ?></h4>
                                  <p class="mb-0 fs-12">Selamat menggunakan KlikMPK, Sistem Informasi ini dikembangkan
                                      sebagai pendukung penelitian Kadek Wirahyuni yang mengangkat pengembangan evaluasi
                                      afektif berbasis digital pada pembelajaran MPK Bahasa Indonesia di Universitas
                                      Pendidikan Ganesha.</p>
                              </div>
                          </div>
                          <div class="card-body">

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--**********************************
            Content body end
        ***********************************-->
      <?php $this->endSection(); ?>