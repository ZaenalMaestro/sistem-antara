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

<!-- === Modal ==== -->
<div class="modal modal-black fade" id="tambahMatakuliah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Matakuliah</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <!-- ==== form ==== -->
      <form>
        <div class="modal-body">
          <div class="form-group my-2">
            <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Masukkan matakuliah">
          </div>
          <div class="form-group mb-2">
            <input type="number" name="sks" class="form-control" id="jumlahSks" placeholder="Masukkan sks">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info btn-block ml-auto btn-sm">Simpan</button>
        </div>
      </form>
      <!-- ==== end form ==== -->
    </div>
  </div>
</div>

<!-- script -->
<!-- ==== global helper ==== -->
<script src="/js/prodi/helper.js"></script>

<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script src="/js/sweetalert2.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/prodi/get-matakuliah.js"></script>
<script>
  cekLogin()
</script>
<?= $this->endSection() ?>