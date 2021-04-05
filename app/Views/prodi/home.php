<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info text-center">Selamat datang <br>di aplikasi pendaftaran PPI Fakultas Ilmu
        Komputer <br>Universitas Muslim Indonesia
      </h3>
      <div class="card-body">
        <div class="row text-center my-5">
          <div class="col">
            <h1 class="mb-1 mendaftar">0</h1> <span class="text-info">Sudah Mendaftar</span>
          </div>
          <div class="col">
            <h1 class="mb-1 belum-diterima">0</h1> <span class="text-info">Belum Diterima</span>
          </div>
        </div>
        <div class="row text-center mb-3">
          <div class="col">
            <h1 class="mb-1 diterima">0</h1> <span class="text-info">Sudah Diterima</span>
          </div>
          <div class="col">
            <h1 class="mb-1 ditolak">0</h1> <span class="text-info">Ditolak</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ==== global helper ==== -->
<script src="/js/prodi/helper.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/prodi/get-home.js"></script>
<script>
  cekLogin()
</script>

<?= $this->endSection() ?>