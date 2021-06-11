<div id="sikap" class="tab-pane fade">
    <div class="pt-2 border-bottom-1 pb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai Sikap dan Partisipasi</h4>
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
                                    data-target="#infoAspekPenilaian"><i
                                        class="fa fa-info-circle text-primary mr-2"></i>
                                    Aspek Penilaian Mahasiswa</a></li>
                            <li class="dropdown-item"><a href="#" data-toggle="modal"
                                    data-target="#tambahNilaiSikapPartisipasi"><i
                                        class="fa fa-plus text-primary mr-2"></i>
                                    Tambah Nilai Sikap dan Partisipasi</a></li>
                            <?php if (!empty($mahasiswa)) : ?>
                            <li class="dropdown-item"><i class="fa fa-trash text-primary mr-2 "><a
                                        href="<?= base_url(); ?>/hapus-seluruh-nilai-sikap-partisipasi/<?= $d_kelas[0]['id_kelas']; ?>"
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
                                    <th>Detail Nilai Sikap</th>
                                    <th>Detail Nilai Partisipasi</th>
                                    <th>Nilai Akhir</th>
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
                                            data-target="#modalLihatSikap-<?= $m['id_mahasiswa']; ?>"><button
                                                type="button" class="btn btn-primary btn-sm">
                                                Nilai Sikap</button></a>
                                    </td>
                                    <!-- Ubah,Lihat Nilai -->
                                    <div class="modal fade" id="modalLihatSikap-<?= $m['id_mahasiswa']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lihat Nilai Sikap</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Nama
                                                            Mahasiswa</label>
                                                        <input type="text" class="form-control" disabled
                                                            value="<?= $m['nim_mahasiswa']; ?> - <?= $m['nama_mahasiswa']; ?>">
                                                    </div>
                                                    <?php foreach ($nilai_sikap as $sikap) : ?>
                                                    <?php if ($sikap['id_mahasiswa'] == $m['id_mahasiswa']) : ?>
                                                    <form method="POST" action="">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Santun</label>
                                                            <input type="number" step="0.01" name="santun" min="0"
                                                                max="100" class="form-control"
                                                                value="<?= $sikap['nilai_santun']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Displin</label>
                                                            <input type="number" step="0.01" name="disiplin" min="0"
                                                                max="100" class="form-control"
                                                                value="<?= $sikap['nilai_disiplin']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Berani</label>
                                                            <input type="number" step="0.01" name="berani" min="0"
                                                                max="100" class="form-control"
                                                                value="<?= $sikap['nilai_berani']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Rata-Rata Nilai</label>
                                                            <input type="number" step="0.01" disabled
                                                                class="form-control"
                                                                value="<?= $sikap['hasil_nilai_sikap']; ?>">
                                                        </div>
                                                        <input type="hidden" name="sikap"
                                                            value="<?= $sikap['id_sikap_partisipasi']; ?>">
                                                        <input type="hidden" name="mahasiswa"
                                                            value="<?= $m['id_mahasiswa']; ?>">
                                                        <div class="form-group">
                                                            <button type="submit" name="submit_perubahan_sikap"
                                                                value="submit_perubahan_sikap"
                                                                class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ubah,Lihat Nilai -->
                                    <td><a href="#" data-toggle="modal"
                                            data-target="#modalLihatPartisipasi-<?= $m['id_mahasiswa']; ?>"><button
                                                type="button" class="btn btn-primary btn-sm">
                                                Nilai Partisipasi</button></a>
                                    </td>
                                    <!-- Ubah,Lihat Nilai -->
                                    <div class="modal fade" id="modalLihatPartisipasi-<?= $m['id_mahasiswa']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lihat Nilai Partisipasi</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Nama
                                                            Mahasiswa</label>
                                                        <input type="text" class="form-control" disabled
                                                            value="<?= $m['nim_mahasiswa']; ?> - <?= $m['nama_mahasiswa']; ?>">
                                                    </div>
                                                    <?php foreach ($nilai_sikap as $sikap) : ?>
                                                    <?php if ($sikap['id_mahasiswa'] == $m['id_mahasiswa']) : ?>
                                                    <form method="POST" action="">
                                                        <?= csrf_field(); ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Kehadiran</label>
                                                            <input type="number" step="0.01" name="kehadiran" required
                                                                min="0" max="100" class="form-control"
                                                                value="<?= $sikap['nilai_kehadiran']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Kepatuhan</label>
                                                            <input type="number" step="0.01" name="kepatuhan" required
                                                                min="0" max="100" class="form-control"
                                                                value="<?= $sikap['nilai_kepatuhan']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Keaktifan</label>
                                                            <input type="number" step="0.01" name="keaktifan" required
                                                                min="0" max="100" class="form-control"
                                                                value="<?= $sikap['nilai_keaktifan']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Rata-Rata Nilai</label>
                                                            <input type="number" step="0.01" disabled
                                                                class="form-control"
                                                                value="<?= $sikap['hasil_nilai_partisipasi']; ?>">
                                                        </div>
                                                        <input type="hidden" name="sikap"
                                                            value="<?= $sikap['id_sikap_partisipasi']; ?>">
                                                        <input type="hidden" name="mahasiswa"
                                                            value="<?= $m['id_mahasiswa']; ?>">
                                                        <div class="form-group">
                                                            <button type="submit" name="submit_perubahan_partisipasi"
                                                                value="submit_perubahan_partisipasi"
                                                                class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Ubah,Lihat Nilai -->
                                    <?php if (empty($m['nilai_sikap'])) : ?>
                                    <td><strong>Nilai Tidak Ada</strong></td>
                                    <?php else : ?>
                                    <td><strong><?= $m['nilai_sikap']; ?></strong></td>
                                    <?php endif; ?>
                                    <?php
                                        if ($m['nilai_sikap'] >= 85 && $m['nilai_sikap'] <= 100) {
                                            $skala = "4,00";
                                            $huruf = "A";
                                        } else if ($m['nilai_sikap'] >= 81 && $m['nilai_sikap'] <= 84) {
                                            $skala = "3,75";
                                            $huruf = "A-";
                                        } else if ($m['nilai_sikap'] >= 77 && $m['nilai_sikap'] <= 80) {
                                            $skala = "3,25";
                                            $huruf = "B+";
                                        } else if ($m['nilai_sikap'] >= 73 && $m['nilai_sikap'] <= 76) {
                                            $skala = "3,00";
                                            $huruf = "B";
                                        } else if ($m['nilai_sikap'] >= 69 && $m['nilai_sikap'] <= 72) {
                                            $skala = "2,75";
                                            $huruf = "B-";
                                        } else if ($m['nilai_sikap'] >= 65 && $m['nilai_sikap'] <= 68) {
                                            $skala = "2,50";
                                            $huruf = "C+";
                                        } else if ($m['nilai_sikap'] >= 61 && $m['nilai_sikap'] <= 64) {
                                            $skala = "2,00";
                                            $huruf = "C";
                                        } else if ($m['nilai_sikap'] >= 40 && $m['nilai_sikap'] <= 60) {
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
                                            <a href="<?= base_url(); ?>/hapus-nilai-sikap-partisipasi/<?= $m['id_mahasiswa']; ?>/<?= $d_kelas[0]['id_kelas']; ?>"
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
</div>



<!-- Modal -->
<!-- Tambah Nilai Sikap Mahasiswa-->
<div class="modal fade" id="tambahNilaiSikapPartisipasi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nilai Sikap Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="text-black font-w500">Nama Mahasiswa</label>
                        <select class="form-control default-select" required name="mahasiswa">
                            <?php foreach ($mahasiswa as $mhs) : ?>
                            <option value="<?= $mhs['id_mahasiswa']; ?>"><?= $mhs['nim_mahasiswa']; ?> -
                                <?= $mhs['nama_mahasiswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <h5 class="text-center mt-5">Penilaian Sikap</h5>
                    <div class="form-group">
                        <label class="text-black font-w500">Santun</label>
                        <input type="number" step="0.01" min="0" max="100" placeholder="0-100" class="form-control"
                            required name="santun" value="<?= old('santun'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Displin</label>
                        <input type="number" step="0.01" min="0" max="100" placeholder="0-100" class="form-control"
                            required name="disiplin" value="<?= old('disiplin'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Berani</label>
                        <input type="number" step="0.01" min="0" max="100" placeholder="0-100" class="form-control"
                            required name="berani" value="<?= old('berani'); ?>">
                    </div>

                    <h5 class="text-center mt-5">Penilaian Partisipasi</h5>
                    <div class="form-group">
                        <label class="text-black font-w500">Kehadiran</label>
                        <input type="number" step="0.01" min="0" max="100" placeholder="0-100" class="form-control"
                            required name="kehadiran" value="<?= old('kehadiran'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Kepatuhan</label>
                        <input type="number" step="0.01" min="0" max="100" placeholder="0-100" class="form-control"
                            required name="kepatuhan" value="<?= old('kepatuhan'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Keaktifan</label>
                        <input type="number" step="0.01" min="0" max="100" placeholder="0-100" class="form-control"
                            required name="keaktifan" value="<?= old('keaktifan'); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit_nilai_sikap_partisipasi"
                            name="submit_nilai_sikap_partisipasi" class="btn btn-primary">UNGGAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah Nilai Sikap Mahasiswa-->





<!-- Modal Info -->
<div class="modal fade" id="infoAspekPenilaian">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aspek Penilaian Sikap dan Partisipaasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="mb-4">Aspek Penilaian Sikap</h6>
                <div class="table-responsive mb-5">
                    <table class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>
                                    Sikap
                                </th>
                                <th>
                                    Disiplin
                                </th>
                                <th>
                                    Berani
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <p>- Menyampaikan pendapat atau berbicara dengan bahasa yang sopan</p>
                                        </li>
                                        <li>
                                            <p>- Memiliki tata krama yang baik</p>
                                        </li>
                                        <li>
                                            <p>- Menghormati dan menghargai pendapat orang lain</p>
                                        </li>
                                        <li>
                                            <p>- Tidak bersikap rasis</p>
                                        </li>
                                        <li>
                                            <p>- Meminta izin apabila tidak dapat mengikuti perkuliahan atau meminta
                                                maaf
                                                saat
                                                terlambat mengikuti perkuliahan</p>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <p>- Tepat waktu saat mengerjakan tugas</p>
                                        </li>
                                        <li>
                                            <p>- Tepat waktu saat mengumpulkan tugas atau menyelesaikan tugas</p>
                                        </li>
                                        <li>
                                            <p>- Tepat waktu mengikuti perkuliahan dari awal hingga akhir</p>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <p>- Berani memberikan kritik dan saran</p>
                                        </li>
                                        <li>
                                            <p>- Berani bertanggung jawab </p>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h6 class="mb-4">Aspek Penilaian Partisipasi</h6>
                <div class="table-responsive">
                    <table class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>
                                    Kehadiran
                                </th>
                                <th>
                                    Kepatuhan
                                </th>
                                <th>
                                    Keaktfian
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <p>-Hadir secara penuh pada setiap perkuliahan</p>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <p>-Menggunakan bahasa Indonesia yang baik dan benar</p>
                                        </li>
                                        <li>
                                            <p>-Mengikuti arahan dosen</p>
                                        </li>
                                        <li>
                                            <p>-Mengikuti kesepakatan perkuliahan </p>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <p>-Memberikan tanggapan/respons/jawaban apabila diberikan pertanyaan
                                                oleh dosen</p>
                                        </li>
                                        <li>
                                            <p>-Melakukan diskusi antarkelompok secara aktif</p>
                                        </li>
                                        <li>
                                            <p>-Mengajukan pertanyaan</p>
                                        </li>
                                        <li>
                                            <p>-Mencari sumber-sumber belajar lain</p>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">TUTUP</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Info -->