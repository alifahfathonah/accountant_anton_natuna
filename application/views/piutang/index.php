
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-2"><?= $judul ?></h1>
            <div class="card-body">
            <a href="<?= base_url('Transaksi/bayarPiutang') ?>" class="btn btn-danger">Bayar Piutang</a>
              <table class="table table-bordered table-hovered mt-3">
                  <?php if(empty($piutang)) : ?>
                    <p class="mt-5 alert alert-success" style="font-weight: 600">Data Piutang tidak Ada</p>
                  <?php else : ?>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>                 
                    <th>Kode Pelanggan</th>
                    <th>No Reff</th>
                    <th>Keterangan</th>
                    <th>No Acc</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php $saldo = 0 ?>
                    <?php foreach($piutang as $piutang) : ?>
                    <tr>
                      <th><?= $i ?></th>
                      <td><?= $piutang['tanggal'] ?></td>
                      <td><?= $piutang['nama_pelanggan'] ?></td>
                      <td><?= $piutang['no_reff'] ?></td>
                      <td><?= $piutang['keterangan'] ?></td>
                      <td><?= $piutang['no_acc'] ?></td>
                      <td><?= number_format($piutang['debet']) ?></td>
                      <td><?= number_format($piutang['kredit']) ?></td>
                      <td><?= $saldo = $saldo + $piutang['debet'] - $piutang['kredit']?></td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                  <?php endif ?>
                </tbody>
              </table>
              <?= $this->pagination->create_links() ?>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->