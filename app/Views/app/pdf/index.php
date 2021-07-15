<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .img {
            width: 150px;
            margin-top: 1rem;
        }

        .text {
            font-size: 25px;
        }

        .text small {
            font-size: 15px;
        }

        .invoice-info {
            margin-left: 1rem;
            margin-top: 50px;
        }

        .invoice-info .invoice-col {
            margin-top: 50px;
        }

        .kol1 {
            float: right;
        }

        .table {
            font-size: 12px;
        }

        .lead {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header text">
                        <img class="img" src="assets/images/profile/azhar.png" /> CV. Azharku Media
                        <small class="float-right">Date: <?= date('d F Y'); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-md-4">
                    Pelanggan
                    <div>
                       
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Jenis Katalog</th>
                                <th>Ukuran</th>
                                <th>Jenis Kertas</th>
                                <th>Cover</th>
                                <th>Finishing</th>
                                <th>Cetakan</th>
                                <th>Dok. File</th>
                                <th>Harga</th>
                                <th>QTY</th>
                                <th>Date Order</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-6">
                    <p class="lead">Total Pemesanan</p>

                    <div class="table-responsive">
                        <table class="table">
                           
                            <tr>
                                <th colspan="3" style="text-align: right">Total:</th>

                               
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>