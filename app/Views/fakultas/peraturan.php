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
<!-- ==== helper ==== -->
<script src="/js/fakultas/helper.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/fakultas/get-peraturan.js"></script>
<script src="/js/fakultas/helper.js"></script>
<script>cekLogin()</script>
<?= $this->endSection() ?>