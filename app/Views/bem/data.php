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
              <!-- <tr class="text-center">
                <td class="text-left">13020160099</td>
                <td class="text-left">Rehan Armand</td>
                <td><span class="badge badge-warning badge-sm">belum dikonfirmasi</span></td>
                <td>
                  <a href="/bem/detail" class="btn btn-info btn-sm">Lihat Detail</a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- script -->
<!-- ==== global helper ==== -->
<script src="/js/bem/helper.js"></script>

<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/bem/get-data.js"></script>
<script>
  cekLogin()
</script>
<?= $this->endSection() ?>