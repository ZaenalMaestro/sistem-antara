<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Daftar matakuliah PPI
      </h3>
      <div class="card-body mx-4 my-4">
        <div class="table-responsive ps">

          <!-- ==== tabel matakuliah ==== -->
          <table class="table tablesorter table-matakuliah-ppi" id="matkul-ppi" width="100%">
            <thead class="text-info">
              <tr>
                <!-- <th class="text-info">
                  #
                </th> -->
                <th class="text-info">Matakuliah</th>
                <th class="text-info text-left">SKS</th>
                <th class="text-info text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="pilih-matakuliah">
                <!-- <td>1</td> -->
                <td>Java Lanjut</td>
                <td>2</td>
                <td class="text-center javascript">
                  <button type="button" class="btn btn-info btn-sm matakuliah-terpilih" data-matakuliah="javascript"
                    data-sks="2">programkan</button>
                </td>
              </tr>
              <tr class="pilih-matakuliah">
                <!-- <td>1</td> -->
                <td>Java</td>
                <td>1</td>
                <td class="text-center java">
                  <button type="button" class="btn btn-info btn-sm matakuliah-terpilih" data-matakuliah="java"
                    data-sks="1">programkan</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Matakuliah PPI yang dipilih
      </h3>
      <div class="card-body mx-4 my-4">
        <div class="table-responsive ps">
          <table class="table" id="table-belanja-matakuliah-ppi">
            <thead class="text-info text-left">
              <tr>
                <th class="text-info">
                  Matakuliah
                </th>
                <th class="text-info">
                  SKS
                </th>
                <th class="text-info">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody class="text-left">
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-info btn-sm d-none tombol-simpan-matakuliah">Simpan Matakuliah</button>
          </div>
          <div class="col">
            <h4 class="text-right mt-1">Total SKS : <span class="text-info total-sks">0</span></h4>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="/js/jquery.js"></script>
<script src="/js/dataTables.js"></script>
<script src="/js/dataTables.bootstrap4.js"></script>
<script src="/js/mahasiswa/matakuliah/get-element.js"></script>
<script src="/js/mahasiswa/matakuliah/daftar-ppi.js"></script>
<script src="/js/mahasiswa/matakuliah/submit-matkul-ppi.js"></script>
<script src="/js/mahasiswa/matakuliah/batalkan-matkul-ppi.js"></script>
<script>
  $(document).ready(function(){
    $('#matkul-ppi').DataTable();
  })
</script>
<?= $this->endSection() ?>