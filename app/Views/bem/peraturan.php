<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <div class="row mb-3">
          <div class="col-md-9">
            <h4 class="card-title">Peraturan PPI</h4>
          </div>
          <div class="col">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambahMatakuliah">Tambah
              Peraturan</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- ==== table peraturan ==== -->
        <div class="table-responsive ps">
          <table class="table tablesorter " id="matkul-ppi">
            <thead class="text-info">
              <tr>
                <th class="text-info text-center">
                  #
                </th>
                <th class="text-info text-left">
                  Peraturan
                </th>
                <th class="text-info text-center">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">
                  1
                </td>
                <td>
                  <div class="row">
                    <div class="col-md-8">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      Voluptatem quam consectetur minima
                      doloremque repellat ratione temporibus commodi accusamus in eaque? Eos
                      aut blanditiis recusandae est excepturi iste explicabo maiores dolore!
                    </div>
                  </div>

                </td>
                <td class="text-center">
                  <button class="btn btn-warning btn-sm">Ubah</button>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- ==== end table peraturan ==== -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- === Modal ==== -->
<div class="modal modal-black fade" id="tambahMatakuliah" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Peraturan</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <!-- ==== form ==== -->
      <form>
        <div class="modal-body">
          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan peraturan..." autofocus></textarea>
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

<!-- ==== script ==== -->
<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function () {
    $('#matkul-ppi').DataTable();
  })
</script>
<?= $this->endSection() ?>