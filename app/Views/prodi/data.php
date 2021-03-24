<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Daftar Mahasiswa PPI
      </h3>
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
              <tr class="text-center">
                <td class="text-left">13020160099</td>
                <td class="text-left">Rehan Armand</td>
                <td><span class="badge badge-warning badge-sm">belum dikonfirmasi</span></td>
                <td>
                  <a href="/prodi/detail" class="btn btn-info btn-sm">Lihat Detail</a>
                </td>
              </tr>
              <tr class="text-center">
                <td class="text-left">13020160101</td>
                <td class="text-left">Jhon Doe</td>
                <td><span class="badge badge-success badge-sm">telah dikonfirmasi</span></td>
                <td>
                  <a href="/prodi/detail" class="btn btn-info btn-sm">Lihat Detail</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- script -->
<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script src="/js/matakuliah/get-element.js"></script>
<script src="/js/matakuliah/daftar-ppi.js"></script>
<script src="/js/matakuliah/update-matkul-ppi.js"></script>
<script src="/js/matakuliah/batalkan-matkul-ppi.js"></script>
<script>
  $(document).ready(function () {
    $('#matkul-ppi').DataTable();
  })
</script>
<?= $this->endSection() ?>