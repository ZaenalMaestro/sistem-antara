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
                <h5><span class="mr-4">Nama</span> : <span class="ml-2 nama">-</span></h5>
                <h5><span class="mr-2">Stambuk</span> : <span class="ml-2 stambuk">-</span></h5>
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
              <div class="row justify-content-end">
                <div class="col-md-3 ml-3">
                  <h4>Total SKS : <span class="total-sks text-info font-weight-bolder">-</span></h4>
                </div>
              </div>
              <button type="button" class="btn btn-info btn-sm btn-konfirmasi d-none" style="width: 50%;">Konfirmasi</button>
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
<script src="/js/prodi/helper.js"></script>

<script src="/js/jquery.js"></script>
<script src="/js/sweetalert2.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/prodi/get-detail-mahasiswa.js"></script>
<script src="/js/prodi/detail-konfirmasi.js"></script>
<script src="/js/prodi/detail-tolak.js"></script>
<script>
  cekLogin()
</script>

<?= $this->endSection() ?>