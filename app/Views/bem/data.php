<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <!-- ==== data matakuliah -->
  <div class="col-md-8">
    <div class="card card-nav-tabs">
      <div class="row">
        <div class="col-md">
          <h3 class="card-header card-header-info">Daftar Mahasiswa PPI</h3>
        </div>
        <div class="col-md-4">
          <a href="/bem/cetak"class="btn btn-info btn-sm mt-3">data peserta PPI</a>
        </div>
      </div>
      
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

  <!-- ==== jadwal ppi -->
  <div class="col">
  <div class="card card-nav-tabs">
    <div class="row">
      <div class="col-md">
        <h3 class="card-header card-header-info">Jadwal PPI</h3>
      </div>
      <div class="col-md-5">
        <button class="btn btn-info btn-sm text-center mt-3" data-toggle="modal" data-target="#ubah_jadwa">Ubah Jadwal</button>
      </div>
    </div>
      <div class="card-body my-4">
        <div class="ml-2">
          <table>
            <tr>
              <td><h4 class="text-info mr-2">Tanggal Pendaftaran</h4></td>
              <td>
                <h4>
                  <span class="mr-2">:</span>
                  <span class="data-mulai-pendaftaran">-</span>
                </h4>
              </td>
            </tr>
            <tr>
              <td><h4 class="text-info mr-2">Batas Pendaftaran</h4></td>
              <td>
                <h4>
                  <span class="mr-2">:</span>
                  <span class="data-batas-pendaftaran">-</span>
                </h4>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- === Modal ==== -->
<div class="modal modal-black fade right" id="ubah_jadwa" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul">Ubah Jadwal PPI</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="tutup">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <!-- ==== form ==== -->
      <form>
        <div class="modal-body">
          <input type="hidden" id="id-jadwal">
          <!-- ==== tanggal pendaftaran ==== -->
          <div class="form-group">
            <input class="form-control" type="date" name="tanggal-pendaftaran" id="tanggal-pendaftaran">
          </div>
          <!-- ==== batas pendaftaran ==== -->
          <div class="form-group">
            <input class="form-control" type="date" name="batas-pendaftaran" id="batas-pendaftaran">  
          </div>

        </div>
        <div class="modal-footer">
          <p style="font-style: italic;color: grey">**Format: Bulan/Tanggal/Tahun</p>
          <button type="button" class="btn btn-success btn-block ml-auto btn-sm btn-ubah" style="background-color: #00F2C3;">Ubah Jadwal</button>
        </div>
      </form>
      <!-- ==== end form ==== -->
    </div>
  </div>
</div>


<!-- script -->
<!-- ==== global helper ==== -->
<script src="/js/sweetalert2.js"></script>
<script src="/js/global-helper.js"></script>
<script src="/js/bem/helper.js"></script>

<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/bem/get-data.js"></script>
<script src="/js/bem/jadwal-get.js"></script>
<script src="/js/bem/jadwal-edit.js"></script>
<script>
  cekLogin()
</script>
<?= $this->endSection() ?>