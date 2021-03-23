<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <div class="card-body mx-4 my-4">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-10">
                <h5><span class="mr-4">Nama</span> : <span class="ml-2">Muh Ruryl Samdilah</span></h5>
                <h5><span class="mr-2">Stambuk</span> : <span class="ml-2">13020160001</span></h5>
              </div>
              <div class="col mt-2">
                <button class="btn btn-info btn-sm">Cetak</button>
              </div>
            </div>

          </div>
        </div>

        <!-- ==== table ==== -->
        <div class="row justify-content-center">
          <div class="col-md-10">
            <h4 class="text-center mb-1 mt-3 text-info">Daftar Belanja Matakuliah PPI</h4>
            <div class="table-responsive ps">
              <table class="table tablesorter " id="">
                <thead class="text-info">
                  <tr>
                    <th class="text-info text-center">#</th>
                    <th class="text-info text-left">Matakuliah</th>
                    <th class="text-info text-left">SKS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td class="text-left">Java Lanjut</td>
                    <td class="text-left">2</td>
                  </tr>
                  <tr>
                    <td class="text-center">2</td>
                    <td class="text-left">Basis Data I</td>
                    <td class="text-left">2</td>
                  </tr>
                  <tr>
                    <td class="text-center">3</td>
                    <td class="text-left">Matematika Diskrit</td>
                    <td class="text-left">3</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- ==== end table ==== -->



      </div>
    </div>
  </div>

  <!-- script -->
  <script src="/js/jquery.js"></script>
  <?= $this->endSection() ?>