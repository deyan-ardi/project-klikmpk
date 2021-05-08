<div id="hubungi" class="tab-pane">
    <div class="profile-about-me">
        <div class="pt-4 border-bottom-1 pb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hubungi Kami</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label class="text-black font-w500">Email</label>
                                <input type="email" class="form-control" name="email" required
                                    placeholder="example@mail.com" value="<?= old('email'); ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Nama Kamu</label>
                                <input type="text" class="form-control" required name="nama"
                                    value="<?= old('nama'); ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Subjek Email</label>
                                <input type="text" required name="subjek" value="<?= old('subjek'); ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Pesan Kamu</label>
                                <textarea name="pesan" required id="pesan" placeholder="Pesan Yang Ingin Disampaikan"
                                    class="form-control" cols="30" rows="10" value="<?= old('pesan'); ?>"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" value="submit_hubungi_kami" name="submit_hubungi_kami"
                                    class="btn btn-primary">Kirim Email</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>