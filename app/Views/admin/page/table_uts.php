<div id="uts" class="tab-pane fade">
    <div class="pt-4 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kegiatan UTS</h4>
                    <div class="dropdown ml-auto">
                        <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24">
                                    </rect>
                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                    </circle>
                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                </g>
                            </svg></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="#" data-toggle="modal"
                                    data-target="#tambahKegiatanUTS"><i class="fa fa-plus text-primary mr-2"></i>
                                    Tambah Kegiatan UTS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama UTS</th>
                                    <th>Catatan UTS</th>
                                    <th>Tanggal UTS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kegiatan_uts as $uts) :
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $uts['nama_uts']; ?></td>
                                    <td><?= $uts['kategori_uts']; ?></td>
                                    <td> <?= date('d F Y', strtotime($uts['tgl_uts'])) ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" data-toggle="modal"
                                                data-target="#ubahKegiatanUTS-<?= $uts['id_kegiatan_uts']; ?>"><button
                                                    type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Ubah Kegiatan UTS"><i class="fa fa-pencil"></i></button></a>
                                            <!-- Ubah Mahasiswa -->
                                            <div class="modal fade"
                                                id="ubahKegiatanUTS-<?= $uts['id_kegiatan_uts']; ?>">
                                                <div class=" modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ubah Kegiatan UTS</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <?= csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Nama
                                                                        UTS</label>
                                                                    <input type="text" class="form-control" required
                                                                        name="nama_uts"
                                                                        value="<?= (old('nama_uts')) ? old('nama_uts') : $uts['nama_uts']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Catatan
                                                                        UTS</label>
                                                                    <textarea name="kategori_uts" id="kategori_uts"
                                                                        class="form-control"
                                                                        placeholder="Catatan UTS (Opsional)" cols="30"
                                                                        rows="10"><?= (old('kategori_uts')) ? old('kategori_uts') : $uts['kategori_uts']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Tanggal
                                                                        UTS</label>
                                                                    <input type="date" class="form-control" required
                                                                        name="tgl_uts"
                                                                        value="<?= (old('tgl_uts')) ? old('tgl_uts') : $uts['tgl_uts']; ?>">
                                                                </div>
                                                                <input type="hidden" name="id_kegiatan_uts"
                                                                    value="<?= $uts['id_kegiatan_uts']; ?>">
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        value="submit_ubah_kegiatan_uts"
                                                                        name="submit_ubah_kegiatan_uts"
                                                                        class="btn btn-primary">UNGGAH</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?= base_url(); ?>/hapus-kegiatan-uts/<?= $uts['id_kegiatan_uts']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
                                                class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i
                                                    class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                    title="Hapus Kegiatan UTS"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($kegiatan_uts)) : ?>
    <div class="pt-4 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai UTS</h4>
                    <div class="dropdown ml-auto">
                        <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24">
                                    </rect>
                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                    </circle>
                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                </g>
                            </svg></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#tambahNilaiUTS"><i
                                        class="fa fa-plus text-primary mr-2"></i>
                                    Tambah Nilai UTS</a></li>
                            <?php if (!empty($mahasiswa)) : ?>
                            <li class="dropdown-item"><i class="fa fa-trash text-primary mr-2"><a
                                        href="<?= base_url(); ?>/hapus-seluruh-nilai-uts/<?= $d_kelas[0]['id_kelas']; ?>"
                                        class="tombol-hapus"></i>
                                Kosongkan Seluruh Nilai</a></li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nim Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Detail Nilai</th>
                                    <th>Rata-Rata</th>
                                    <th>Nilai Skala</th>
                                    <th>Nilai Huruf</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($mahasiswa as $m) :
                                    ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $m['nim_mahasiswa']; ?></td>
                                    <td><?= $m['nama_mahasiswa']; ?></td>
                                    <td><a href="#" data-toggle="modal"
                                            data-target="#modalLihatNilai-<?= $m['id_mahasiswa']; ?>"><button
                                                type="button" class="btn btn-primary btn-sm">Detail
                                                Nilai</button></a>
                                    </td>
                                    <!-- Ubah,Lihat Nilai -->
                                    <div class="modal fade" id="modalLihatNilai-<?= $m['id_mahasiswa']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lihat Nilai UTS</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nama
                                                                Mahasiswa</label>
                                                            <input type="text" class="form-control" disabled
                                                                value="<?= $m['nim_mahasiswa']; ?> - <?= $m['nama_mahasiswa']; ?>">
                                                        </div>
                                                        <?php foreach ($nilai_uts as $n) : ?>
                                                        <?php if ($n['id_mahasiswa'] == $m['id_mahasiswa']) : ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nilai
                                                                <?= $n['nama_uts']; ?></label>
                                                            <input type="text" class="form-control" disabled
                                                                value="<?= $n['nilai_uts']; ?>">
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="form-group">
                                                            <button type="button" data-dismiss="modal"
                                                                class="btn btn-primary">TUTUP</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ubah,Lihat Nilai -->
                                    <?php if (empty($m['nilai_uts'])) : ?>
                                    <td><strong>Nilai Tidak Ada</strong></td>
                                    <?php else : ?>
                                    <td><strong><?= $m['nilai_uts']; ?></strong></td>
                                    <?php endif; ?>
                                    <?php
                                            if ($m['nilai_uts'] >= 85 && $m['nilai_uts'] <= 100) {
                                                $skala = "4,00";
                                                $huruf = "A";
                                            } else if ($m['nilai_uts'] >= 81 && $m['nilai_uts'] <= 84) {
                                                $skala = "3,75";
                                                $huruf = "A-";
                                            } else if ($m['nilai_uts'] >= 77 && $m['nilai_uts'] <= 80) {
                                                $skala = "3,25";
                                                $huruf = "B+";
                                            } else if ($m['nilai_uts'] >= 73 && $m['nilai_uts'] <= 76) {
                                                $skala = "3,00";
                                                $huruf = "B";
                                            } else if ($m['nilai_uts'] >= 69 && $m['nilai_uts'] <= 72) {
                                                $skala = "2,75";
                                                $huruf = "B-";
                                            } else if ($m['nilai_uts'] >= 65 && $m['nilai_uts'] <= 68) {
                                                $skala = "2,50";
                                                $huruf = "C+";
                                            } else if ($m['nilai_uts'] >= 61 && $m['nilai_uts'] <= 64) {
                                                $skala = "2,00";
                                                $huruf = "C";
                                            } else if ($m['nilai_uts'] >= 40 && $m['nilai_uts'] <= 60) {
                                                $skala = "1,00";
                                                $huruf = "D";
                                            } else {
                                                $skala = "0,00";
                                                $huruf = "E";
                                            }

                                            ?>
                                    <td><?= $skala; ?></td>
                                    <td><?= $huruf; ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="<?= base_url(); ?>/hapus-nilai-uts/<?= $m['id_mahasiswa']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
                                                class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i
                                                    class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                    title="Kosongkan Nilai Mahasiswa"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>



<!-- Modal -->
<!-- Tambah Kegiatan UTS-->
<div class="modal fade" id="tambahKegiatanUTS">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan UTS</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Nama Kegiatan UTS</label>
                        <input type="text" class="form-control" required name="nama_uts"
                            value="<?= old('nama_uts'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Catatan UTS</label>
                        <textarea name="kategori_uts" id="kategori_uts" class="form-control"
                            placeholder="Catatan UTS (Opsional)" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Tanggal UTS</label>
                        <input type="date" class="form-control" required name="tgl_uts" value="<?= old('tgl_uts'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_kegiatan_uts" name="submit_kegiatan_uts"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Kegiatan UTS-->

<!-- Tambah Nilai -->
<div class="modal fade" id="tambahNilaiUTS">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nilai UTS</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Kategori UTS</label>
                        <select class="form-control default-select" required name="kategori_uts">
                            <?php foreach ($kegiatan_uts as $uts) : ?>
                            <option value="<?= $uts['id_kegiatan_uts']; ?>">
                                <?= $uts['nama_uts']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Nama Mahasiswa</label>
                        <select class="form-control default-select" required name="mahasiswa">
                            <?php foreach ($mahasiswa as $mhs) : ?>
                            <option value="<?= $mhs['id_mahasiswa']; ?>"><?= $mhs['nim_mahasiswa']; ?> -
                                <?= $mhs['nama_mahasiswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Niilai UTS</label>
                        <input type="number" step="0.01" min="0" max="100" class="form-control" required
                            name="nilai_uts" value="<?= old('nilai_uts'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_nilai_uts" name="submit_nilai_uts"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Nilai -->