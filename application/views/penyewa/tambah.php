<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card-header" style="background-color: orangered;color:white">
                Form Add Tenant Data
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
                        <input type="text" class="form-control" name="nama_penyewa">
                        <label for="no_hp" style="margin-top: 10px">Phone</label>
                        <input type="number" class="form-control" name="no_hp">
                        <label for="jenis_kelamin" style="margin-top: 10px">Gender</label>
                        <input type="text" class="form-control" name="jenis_kelamin">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Add Tenant Data</button>
                </form>
            </div>
        </div>
    </div>
</div>