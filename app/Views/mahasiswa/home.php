<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info text-center">Selamat datang di aplikasi pendaftaran PPI Fakultas Ilmu Komputer Universitas Muslim Indonesia
      </h3>
      <div class="card-body">

        <h3 class="card-title text-center text-hitung-mundur" style="margin-top: 100px;">Batas Pendaftaran</h3>
        <h1 class="card-title text-center countdown mb-5"></h1>
        <h4 class="card-text"  style="margin-top: 150px;">**Batas pendaftaram sampai <span class="text-warning batas-pendaftaran"></span></p>
        <a href="/mahasiswa/daftarppi" class="btn btn-success mt-3 btn-daftar">Daftar PPI</a>
      </div>
    </div>
  </div>
</div>

<!-- ==== global helper ==== -->
<script src="/js/global-helper.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/mahasiswa/get-home.js"></script>
<?= $this->endSection() ?>