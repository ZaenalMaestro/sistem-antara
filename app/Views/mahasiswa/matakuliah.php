<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Mohon tunggu konfirmasi</h4>
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
              </tr>
            </thead>
            <tbody class="matakuliah-terkonfirmasi">
              <!-- ==== daftar matakuliah yang telah dikonfirmasi prodi ==== -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/js/axios/dist/axios.min.js"></script>
<script src="/js/dom-selector.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/mahasiswa/get-matakuliah.js"></script>
<!-- ==== global helper ==== -->
<script src="/js/global-helper.js"></script>
<?= $this->endSection() ?>