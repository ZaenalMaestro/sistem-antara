<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <!-- ==== data matakuliah -->
  <div class="col-md-8">
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

  <!-- ==== BIAYA PPI ==== -->
  <div class="col-md-4">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Biaya PPI per SKS</h3>
      <div class="card-body mx-4 my-4">
        <form class="form-jadwal d-block">
          <input type="hidden" id="id-jadwal" value="1">
          <!-- ==== BIAYA PPI ==== -->
          <div class="form-group">
            <label for="tanggal-pendaftaran">Biaya PPI (Rp.)</label>
            <input class="form-control" type="number" name="biaya_ppi" id="biaya-ppi">
          </div>
          <p style="font-style: italic;color: grey">** Biaya PPI per 1 sks</p>
          <button type="button" class="btn btn-success btn-block ml-auto btn-sm btn-update-biaya"
            style="background-color: #00F2C3;">Ubah Biaya PPI</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- script -->
<!-- ==== global helper ==== -->
<script src="/js/fakultas/helper.js"></script>

<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script src="/js/sweetalert2.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/fakultas/get-data.js"></script>
<script src="/js/fakultas/get-biaya.js"></script>
<script src="/js/fakultas/update-biaya.js"></script>
<script>
  cekLogin()
</script>
<?= $this->endSection() ?>