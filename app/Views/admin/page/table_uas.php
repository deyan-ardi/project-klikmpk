<div id="uas" class="tab-pane fade">
    <div class="pt-4 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kegiatan UAS</h4>
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
                                    data-target="#tambahKegiatanUAS"><i class="fa fa-plus text-primary mr-2"></i>
                                    Tambah Kegiatan UAS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori UAS</th>
                                    <th>Nama UAS</th>
                                    <th>Tanggal UAS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kegiatan_uas as $uas) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $uas['kategori_uas']; ?></td>
                                    <td><?= $uas['nama_uas']; ?></td>
                                    <td> <?= date('d F Y', strtotime($uas['tgl_uas'])) ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" data-toggle="modal"
                                                data-target="#ubahKegiatanUAS-<?= $uas['id_kegiatan_uas']; ?>"><button
                                                    type="button" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Ubah Kegiatan UAS"><i class="fa fa-pencil"></i></button></a>
                                            <!-- Ubah Mahasiswa -->
                                            <div class="modal fade"
                                                id="ubahKegiatanUAS-<?= $uas['id_kegiatan_uas']; ?>">
                                                <div class=" modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ubah Kegiatan UAS</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <?= csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Nama
                                                                        UAS</label>
                                                                    <input type="text" class="form-control" required
                                                                        name="nama_uas"
                                                                        value="<?= (old('nama_uas')) ? old('nama_uas') : $uas['nama_uas']; ?>">
                                                                </div>
                                                                <?php
                                                                    $praktek = "";
                                                                    $teori = "";
                                                                    if ($uas['kategori_uas'] == "Teori") {
                                                                        $teori = "selected";
                                                                    } else {
                                                                        $praktek = "selected";
                                                                    }
                                                                    ?>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Kategori
                                                                        UAS</label>
                                                                    <select class="form-control default-select" required
                                                                        name="kategori_uas">
                                                                        <option value="Teori" <?= $teori; ?>>Teori
                                                                        </option>
                                                                        <option value="Praktek" <?= $praktek; ?>>
                                                                            Praktek</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-black font-w500">Tanggal
                                                                        UAS</label>
                                                                    <input type="date" class="form-control" required
                                                                        name="tgl_uas"
                                                                        value="<?= (old('tgl_uas')) ? old('tgl_uas') : $uas['tgl_uas']; ?>">
                                                                </div>
                                                                <input type="hidden" name="id_kegiatan_uas"
                                                                    value="<?= $uas['id_kegiatan_uas']; ?>">
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        value="submit_ubah_kegiatan_uas"
                                                                        name="submit_ubah_kegiatan_uas"
                                                                        class="btn btn-primary">UNGGAH</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?= base_url(); ?>/hapus-kegiatan-uas/<?= $uas['id_kegiatan_uas']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
                                                class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i
                                                    class="fa fa-trash" data-toggle="tooltip" data-placement="bottom"
                                                    title="Hapus Kegiatan UAS"></i></a>
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
    <?php if (!empty($kegiatan_uas)) : ?>
    <div class="pt-4 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai UAS</h4>
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
                            <li class="dropdown-item"><a href="#" data-toggle="modal" data-target="#tambahNilaiUAS"><i
                                        class="fa fa-plus text-primary mr-2"></i>
                                    Tambah Nilai UAS</a></li>
                            <?php if (!empty($mahasiswa)) : ?>
                            <li class="dropdown-item"><i class="fa fa-trash text-primary mr-2"><a
                                        href="<?= base_url(); ?>/hapus-seluruh-nilai-uas/<?= $d_kelas[0]['id_kelas']; ?>"
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
                                            data-target="#modalLihatNilaiUAS-<?= $m['id_mahasiswa']; ?>"><button
                                                type="button" class="btn btn-primary btn-sm">Detail
                                                Nilai</button></a>
                                    </td>
                                    <!-- Ubah,Lihat Nilai -->
                                    <div class="modal fade" id="modalLihatNilaiUAS-<?= $m['id_mahasiswa']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lihat Nilai UAS</h5>
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

                                                        <?php foreach ($nilai_uas as $nilai) : ?>
                                                        <?php if ($nilai['id_mahasiswa'] == $m['id_mahasiswa']) : ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nilai
                                                                <?= $nilai['nama_uas']; ?>
                                                                (<?= $nilai['kategori_uas']; ?>
                                                                )</label>
                                                            <input type="text" class="form-control" disabled
                                                                value="<?= $nilai['nilai_uas']; ?>">
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
                                    <?php if (empty($m['nilai_uas'])) : ?>
                                    <td><strong>Nilai Tidak Ada</strong></td>
                                    <?php else : ?>
                                    <td><strong><?= $m['nilai_uas']; ?></strong></td>
                                    <?php endif; ?>
                                    <?php
                                            if ($m['nilai_uas'] >= 85 && $m['nilai_uas'] <= 100) {
                                                $skala = "4,00";
                                                $huruf = "A";
                                            } else if ($m['nilai_uas'] >= 81 && $m['nilai_uas'] <= 84) {
                                                $skala = "3,75";
                                                $huruf = "A-";
                                            } else if ($m['nilai_uas'] >= 77 && $m['nilai_uas'] <= 80) {
                                                $skala = "3,25";
                                                $huruf = "B+";
                                            } else if ($m['nilai_uas'] >= 73 && $m['nilai_uas'] <= 76) {
                                                $skala = "3,00";
                                                $huruf = "B";
                                            } else if ($m['nilai_uas'] >= 69 && $m['nilai_uas'] <= 72) {
                                                $skala = "2,75";
                                                $huruf = "B-";
                                            } else if ($m['nilai_uas'] >= 65 && $m['nilai_uas'] <= 68) {
                                                $skala = "2,50";
                                                $huruf = "C+";
                                            } else if ($m['nilai_uas'] >= 61 && $m['nilai_uas'] <= 64) {
                                                $skala = "2,00";
                                                $huruf = "C";
                                            } else if ($m['nilai_uas'] >= 40 && $m['nilai_uas'] <= 60) {
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
                                            <a href="<?= base_url(); ?>/hapus-nilai-uas/<?= $m['id_mahasiswa']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
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
<!-- Tambah Kegiatan UAS-->
<div class="modal fade" id="tambahKegiatanUAS">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan UAS</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Nama Kegiatan UAS</label>
                        <input type="text" class="form-control" required name="nama_uas"
                            value="<?= old('nama_uas'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Kategori UAS</label>
                        <select class="form-control default-select" required name="kategori_uas">
                            <option value="Teori">Teori</option>
                            <option value="Praktek">Praktek</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Tanggal UAS</label>
                        <input type="date" class="form-control" required name="tgl_uas" value="<?= old('tgl_UAS'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_kegiatan_uas" name="submit_kegiatan_uas"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Kegiatan UAS-->

<!-- Tambah Nilai -->
<div class="modal fade" id="tambahNilaiUAS">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nilai UAS</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Kategori UAS</label>
                        <select class="form-control default-select" required name="kategori_uas">
                            <?php foreach ($kegiatan_uas as $uas) : ?>
                            <option value="<?= $uas['id_kegiatan_uas']; ?>"><?= $uas['kategori_uas']; ?> -
                                <?= $uas['nama_uas']; ?></option>
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
                        <label class="text-black font-w500">Nilai UAS</label>
                        <input type="number" min="0" max="100" class="form-control" required name="nilai_uas"
                            value="<?= old('nilai_uas'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_nilai_uas" name="submit_nilai_uas"
                            class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Nilai -->