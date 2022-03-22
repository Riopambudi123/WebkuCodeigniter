    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

        <?php if(session()->get('message')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              Data siswa berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
            </div>
        <?php endif; ?>

            <div class="row">
                <div class="col-md-6">
                    <?php 
                        if (session()->get('err')) {
                            echo "<div class='alert alert-danger' role='alert'>". session()->get('err') ."</div>";
                        }
                    ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                    <i class="fa fa-plus"> Tambah Data</i>
                </button>
            </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>DATA</th>
                                <th>NAMA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach($pendataan->getResultArray() as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $row['data']; ?></td>
                                <td><?= $row['nama']; ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pendataan/tambah'); ?>" method="post">
                <div class="form-group mb-0">
                  <label for="data"></label>
                  <input type="text" name="data" id="data" class="form-control" placeholder="Masukkan Data">
                </div>
                <div class="form-group mb-0">
                  <label for="nama"></label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
      </div>
    </div>
</div>