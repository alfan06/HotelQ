<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Transaction Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('flash-data-hapus')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Transaction Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <?php
            if ($this->session->userdata('level') == "user") {
            ?>
                <!-- <a href="<?= base_url(); ?>transaksi/laporan_pdf" class="btn btn-info">Print Transaction Data</a> -->
                <a href="<?= base_url(); ?>transaksi/tambah" class="btn btn-primary">Added</a>
            <?php
            } else {
            ?>
                <!-- <a href="<?= base_url(); ?>transaksi/tambah" class="btn btn-primary">Added</a> -->
            <?php
            }
            ?>
        </div>
    </div>
    <div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <h2>Daftar Transaksi</h2>
            <table class="table table-striped table-bordered" id="listTransaksi">
                <thead style="background-color: #6e3158;color:white">
                    <tr>
                        <th scope="col">Tenant Name</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transaksi['data'] as $tr) :
                    ?>
                        <tr>
                            <td><?= $tr['nama_penyewa'] ?></td>
                            <td><?= $tr['nama_kamar'] ?> <?= $tr['jenis_kamar'] ?></td>
                            <td><?= $tr['status'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>