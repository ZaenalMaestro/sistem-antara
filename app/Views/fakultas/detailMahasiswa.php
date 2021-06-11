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
                <table>
                  <!-- nama -->
                  <tr>
                    <td>
                      <span class="mr-5 text-secondary">Nama</span>
                    </td>
                    <td>
                      <span class="mr-1 text-secondary">:</span>
                      <span class="ml-2 nama text-secondary">-</span>
                    </td>
                  </tr>
                  <!-- Stambuk -->
                  <tr>
                    <td>
                      <span class="mr-5 text-secondary">Stambuk</span>
                    </td>
                    <td>
                      <span class="mr-1 text-secondary">:</span>
                      <span class="ml-2 stambuk text-secondary">-</span>
                    </td>
                  </tr>
                  <!-- TOTAL SKS -->
                  <tr>
                    <td>
                      <span class="mr-5 text-secondary">Total SKS</span>
                    </td>
                    <td>
                      <span class="mr-1 text-secondary">:</span>
                      <span class="ml-2 total-sks text-secondary">-</span>
                    </td>
                  </tr>
                  <!-- TOTAL SKS -->
                  <tr>
                    <td>
                      <span class="mr-5 text-secondary">Biaya PPI</span>
                    </td>
                    <td>
                      <span class="mr-1 text-secondary">:</span>
                      <span class="ml-2 biaya-ppi text-secondary">-</span>
                    </td>
                  </tr>
                </table>
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
                <tbody class="table-detail-mahasiswa">
                  <!-- ==== daftar matakuliah mahasiswa==== -->
                </tbody>
              </table>
              <button type="button" class="btn btn-info btn-sm btn-konfirmasi d-none"
                style="width: 50%;">Verifikasi</button>
              <button type="button" class="btn btn-warning btn-sm btn-tolak d-none" style="width: 49%;">tolak</button>
            </div>
          </div>
        </div>
        <!-- ==== end table ==== -->



      </div>
    </div>
  </div>


  <!-- script -->
  <!-- ==== global helper ==== -->
  <script src="/js/fakultas/helper.js"></script>

  <script src="/js/jquery.js"></script>
  <script src="/js/sweetalert2.js"></script>

  <script src="/js/axios/dist/axios.min.js"></script>
  <script src="/js/dom-selector.js"></script>
  <script src="/js/fakultas/get-detail-mahasiswa.js"></script>
  <script src="/js/fakultas/detail-konfirmasi.js"></script>
  <script src="/js/fakultas/detail-tolak.js"></script>
  <script>
    cekLogin()
  </script>

  <?= $this->endSection() ?>