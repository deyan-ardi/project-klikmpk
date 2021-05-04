<div id="keseluruhan" class="tab-pane fade show active">
    <div class="profile-about-me">
        <div class="pt-4 border-bottom-1 pb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nilai Keseluruhan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display col-lg-12">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nim Mahasiswa</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nilai Sikap</th>
                                        <th>Nilai Tugas</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                        <th>Nilai Total</th>
                                        <th>Nilai Skala</th>
                                        <th>Nilai Huruf</th>
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
                                        <?php if (empty($m['nilai_sikap'])) : ?>
                                        <td>Belum Ada</td>
                                        <?php else : ?>
                                        <td><?= $m['nilai_sikap']; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['nilai_tugas'])) : ?>
                                        <td>Belum Ada</td>
                                        <?php else : ?>
                                        <td><?= $m['nilai_tugas']; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['nilai_tugas'])) : ?>
                                        <td>Belum Ada</td>
                                        <?php else : ?>
                                        <td><?= $m['nilai_uts']; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['nilai_uas'])) : ?>
                                        <td>Belum Ada</td>
                                        <?php else : ?>
                                        <td><?= $m['nilai_uas']; ?></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['nilai_akhir'])) : ?>
                                        <td> <strong>Belum Ada</strong></td>
                                        <?php else : ?>
                                        <td><strong><?= $m['nilai_akhir']; ?></strong></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['skala'])) : ?>
                                        <td> <strong>Belum Ada</strong></td>
                                        <?php else : ?>
                                        <td><strong><?= $m['skala']; ?></strong></td>
                                        <?php endif; ?>
                                        <?php if (empty($m['karakter'])) : ?>
                                        <td> <strong>Belum Ada</strong></td>
                                        <?php else : ?>
                                        <td><strong><?= $m['karakter']; ?></strong></td>
                                        <?php endif; ?>
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
</div>