
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          

          <div class="card">
            <h1 class="h3 text-gray-800 mt-3 ml-3"><?= $judul ?></h1>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="">Jumlah Setoran</label>
                  <input type="text" class="form-control" placeholder="Masukkan jumlah setoran yang akan ditransfer .." name="total_transfer">
                </div>
                <div class="form-group">
                  <label for="">Keterangan</label>
                  <input type="text" class="form-control" placeholder="Masukkan keterangan" name="keterangan">
                </div>
                <div class="form-group">
                  <label for="">Transfer Ke Kantor Cabang</label>
                  <select name="id_kantor" id="" class="form-control">
                    <?php foreach($data_kantor as $data_kantor) : ?>
                      <option value="<?= $data_kantor['id'] ?>"><?= $data_kantor['nama_cabang'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <button class="btn btn-primary" type='submit'>Setor ke Bank</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->















