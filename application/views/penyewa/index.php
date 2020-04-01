<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Tenant Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Tenant Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
    <div class="row mt-4">
        <div class="col-md-6">
            <?php
            if ($this->session->userdata('level') == "user") {
            ?>
                <!-- <a href="<?= base_url(); ?>transaksi/laporan_pdf" class="btn btn-info">Print Transaction Data</a> -->
                <a href="<?= base_url(); ?>penyewa/tambah" class="btn btn-primary">Added</a>
            <?php
            } else {
            ?>
                <!-- <a href="<?= base_url(); ?>transaksi/tambah" class="btn btn-primary">Added</a> -->
            <?php
            }
            ?>
        </div>
    </div>
        <div class="col-lg-12">
            <h2>Tenant Data</h2>
            <table class="table table-striped table-bordered" id="listMahasiswa">
                <thead style="background-color: #73326b;color:white">
                    <tr>
                        <th scope="col">Nama Penyewa</th>
                        <th scope="col">Nomer Hp</th>
                        <th scope="col">Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($penyewa['data'] as $pyw) :
                    ?>
                        <tr>
                            <td><?= $pyw['nama_penyewa'] ?></td>
                            <td><?= $pyw['no_hp'] ?></td>
                            <td><?= $pyw['jenis_kelamin'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
