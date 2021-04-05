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
                <button class="btn btn-info btn-sm btn-cetak">Cetak</button>
              </div>
            </div>
          </div>
        </div>

        <!-- ==== table ==== -->
        <div class="row justify-content-center">
          <div class="col-md-10">
            <h4 class="text-center mb-1 mt-3 text-info">Data Mahasiswa PPI</h4>
            <div class="table-responsive ps">
              <table class="table" id="table-cetak">
                
                
              </table>
            </div>
          </div>
        </div>
        <!-- ==== end table ==== -->
        <iframe id="txtArea1" style="display:none"></iframe>
      </div>
    </div>
  </div>


<!-- script -->
<!-- ==== global helper ==== -->
<script src="/js/bem/helper.js"></script>

<script src="/js/jquery.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/bem/get-data-cetak.js"></script>
<script src="/js/bem/cetak-to-excel.js"></script>
<!-- <script>
  cekLogin()
</script> -->
  <?= $this->endSection() ?>