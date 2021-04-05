<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
<!-- ==== data matakuliah -->
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Daftar Mahasiswa PPI</h3>     
      <div class="card-body mx-4 my-4">
        <div class="table-responsive ps">

          <!-- ==== tabel matakuliah ==== -->
          <table class="table tablesorter table-matakuliah-ppi" id="matkul-ppi" width="100%">
            <thead class="text-info">
              <tr class="text-center">
                <th class="text-info text-left">Stambuk</th>
                <th class="text-info text-left">Nama</th>
                <th class="text-info">Status</th>
                <th class="text-info">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <!-- ===== data mahasiswa PPI===== -->
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

<!-- script -->
<!-- ==== global helper ==== -->
<script src="/js/prodi/helper.js"></script>

<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/prodi/get-data.js"></script>
<script>
  cekLogin()
</script>
<?= $this->endSection() ?>