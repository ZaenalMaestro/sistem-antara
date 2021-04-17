<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Daftar Matakuliah</h4>         
      </div>
      <div class="card-body">
        <div class="table-responsive ps">
          <table class="table tablesorter " id="matkul-ppi">
            <thead class="text-info">
              <tr>
                <th class="text-info">
                  #
                </th>
                <th class="text-info">
                  Matakuliah PPI
                </th>
                <th class="text-info text-left">
                  SKS
                </th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ==== global helper ==== -->
<script src="/js/global-helper.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script src="/js/mahasiswa/get-matakuliah.js"></script>
<script>
  isNotLogin();
</script>

<?= $this->endSection() ?>