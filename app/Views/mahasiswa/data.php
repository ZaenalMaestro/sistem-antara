<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <div class="row">
          <div class="col-md-9">
            <h3 class="card-title">Matakuliah di programkan</h3>
          </div>
          <div class="col">
            <a href="/mahasiswa/editmatakuliah" class="btn btn-info btn-sm btn-ubah-matakuliah">Ubah Matakuliah</a>
          </div>
        </div>
        
      </div>
      <div class="card-body">
        <div class="table-responsive ps">
          <table class="table tablesorter " id="">
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
                  status
                </th>
              </tr>
            </thead>
            <tbody class="daftar-matakuliah">
              <!-- ==== daftar matakuliah ==== -->
            </tbody>
          </table>
          <div class="row justify-content-center">
            <div class="col text-center">
            <h4>Biaya PPI : Rp. <span class="biaya-ppi">-</span></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ==== script ==== -->
<!-- ==== global helper ==== -->
<script src="/js/global-helper.js"></script>
<script src="/js/mahasiswa/helper.js"></script>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/mahasiswa/get-data.js"></script>
<script>
// cek status
  cekLogin()

  axios.get('/api/ppi/jadwal')
    .then(function (response) {
    console.log(response)
    batas_pendaftaran_ppi = response.data[0].batas_pendaftaran
    console.log(cekBatasPendaftaran(batas_pendaftaran_ppi))
    if (cekBatasPendaftaran(batas_pendaftaran_ppi)) {
      // get element tombol daftar
      const btnUpdate = getSelector('.btn-ubah-matakuliah')
      btnUpdate.remove()
    }
  })
  .catch(function (error) {
    console.log(error);
  })
</script>
<?= $this->endSection() ?>