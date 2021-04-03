<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Selamat datang di aplikasi pendaftaran PPI Fakultas Ilmu Komputer Universitas Muslim Indonesia
      </h3>
      <div class="card-body">
        <h1 class="card-title text-center my-5">11:38:11</h1>
        <p class="card-text mt-5">Batas pendaftaram sampai <span class="text-bold">28 Desember 2022</p>
        <a href="/mahasiswa/daftarppi" class="btn btn-success mt-3 btn-daftar">Daftar PPI</a>
      </div>
    </div>
  </div>
</div>
<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/mahasiswa/get-home.js"></script>
<!-- ==== global helper ==== -->
<script src="/js/global-helper.js"></script>
<?= $this->endSection() ?>