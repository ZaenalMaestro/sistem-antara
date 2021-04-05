<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <div class="row mb-3">
          <div class="col-md-9">
            <h4 class="card-title">Daftar Matakuliah</h4>
          </div>
          <div class="col">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambahMatakuliah">Tambah
              Matakuliah</button>
          </div>
        </div>
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
                  Matakuliah
                </th>
                <th class="text-info text-left">
                  SKS
                </th>
                <th class="text-info text-center">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
            <!-- ==== daftar matakuliah -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- === Modal ==== -->
<div class="modal modal-black fade" id="tambahMatakuliah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul">Tambah Matakuliah</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="tutup">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <!-- ==== form ==== -->
      <form>
        <div class="modal-body">
          <input type="hidden" name="id_matakuliah" class="form-control" id="id_matakuliah">
          <div class="form-group my-2">
            <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Masukkan matakuliah">
          </div>
          <div class="form-group mb-2">
            <input type="number" name="sks" class="form-control" id="sks" placeholder="Masukkan sks">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info btn-block ml-auto btn-sm btn-simpan d-block">Simpan</button>
          <button type="button" class="btn btn-info btn-block ml-auto btn-sm btn-edit d-none">Edit</button>
        </div>
      </form>
      <!-- ==== end form ==== -->
    </div>
  </div>
</div>

<!-- script -->
<!-- ==== global helper ==== -->
<script src="/js/bem/helper.js"></script>

<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script src="/js/sweetalert2.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/bem/get-matakuliah.js"></script>
<script src="/js/bem/matakuliah-tambah.js"></script>
<script src="/js/bem/matakuliah-edit.js"></script>
<script>
  cekLogin()
</script>
<?= $this->endSection() ?>