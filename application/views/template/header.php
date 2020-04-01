<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title><?php echo $title ?></title>
    <style>
        .badge {
            margin-left: 3px;
        }
    </style>
    <!-- coba -->
    
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: green">
        <a class="navbar-brand" href="<?= base_url(); ?>">Hotel Q</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-item nav-link active" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= base_url(); ?>Transaksi">Transaction Data</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= base_url(); ?>kamar">Room Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= base_url(); ?>penyewa">Tenant Data</a>
                    </li>
                </ul>     
                </ul>   
            </div>
        </div>

        <span class="navbar-text mr-3">
            WELCOME, <?= $this->session->userdata('user') ?>
        </span>
        <button class="btn btn-danger toggle" type="submit"><a href="<?= base_url(); ?>auth/logout">Logout</a></button>   
    </nav>