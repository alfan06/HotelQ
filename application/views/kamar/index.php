<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Room Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Room Data<strong> Success </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <h2>Room List</h2>
            <table class="table table-striped table-bordered" id="listKamar">
                <thead style="background-color: #67c7c5;color:white">
                    <tr>
                        <th scope="col">Room Name</th>
                        <th scope="col">Type Room</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kamar['data'] as $km) :
                    ?>
                        <tr>
                            <td><?= $km['nama_kamar'] ?></td>
                            <td><?= $km['jenis_kamar'] ?></td>
                            <td><?= $km['harga'] ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>