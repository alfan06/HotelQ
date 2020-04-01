<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card-header" style="background-color: rebeccapurple;color:white">
                Form Add Transaction Data
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Tenant Name</label>
                        <select class="form-control" name="id_penyewa" id="id_penyewa">
                            <option selected="selected">Choose Tenant Data</option>
                            <?php foreach ($penyewa['data'] as $pyw) : ?>
                                <option value="<?= $pyw['id_penyewa'] ?>"><?= $pyw['nama_penyewa'] ?> - <?= $pyw['no_hp'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_kamar">Room Name</label>
                        <select class="form-control" name="id_kamar" id="id_kamar">
                            <option selected="selected">Select Room</option>
                            <?php foreach ($kamar['data'] as $km) : ?>
                                <option value="<?= $km['id_kamar'] ?>"><?= $km['nama_kamar'] ?> <?= $km['jenis_kamar'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>