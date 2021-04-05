<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
  <h3 class="card-title">Peraturan PPI</h3>
    <div class="accordion daftar-peraturan" id="accordionExample">
      <!-- ==== daftar peraturan here ==== -->
    </div>
  </div>
</div>

<!-- ==== script ==== -->
<!-- ==== global helper ==== -->
<script src="/js/global-helper.js"></script>
<script src="/js/mahasiswa/helper.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/mahasiswa/get-peraturan.js"></script>
<script>
  // jjika belum login arahkan ke form login
  cekLogin()
</script>
<?= $this->endSection() ?>