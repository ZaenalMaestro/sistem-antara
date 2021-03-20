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
            <a href="/mahasiswa/editmatakuliah" class="btn btn-info btn-sm">Ubah Matakuliah</a>
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
                <td class="text-center">
                  <span class="badge badge-warning badge-md">menunggu</span>
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
                <td class="text-center">
                  <span class="badge badge-warning badge-md">menunggu</span>
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