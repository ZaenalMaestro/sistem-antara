<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h3 class="card-title">Mohon tunggu konfirmasi</h3>
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
            <tbody>
              <tr>
                <td>
                  1
                </td>
                <td>
                  Java Lanjut
                </td>
                <td>
                  2
                </td>
              </tr>
              <tr>
                <td>
                  2
                </td>
                <td>
                  Matematika Diskrit
                </td>
                <td>
                  2
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>