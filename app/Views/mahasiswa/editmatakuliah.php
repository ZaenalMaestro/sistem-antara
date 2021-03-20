<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Form edit matakuliah PPI
      </h3>
      <div class="card-body mx-4 my-4">
        <form>
          <!-- ==== pilih matakuliah ==== -->          
          <div class="pilih-matakuliah">
                <!-- menampilkan form dinamis berdasar jumlah matakuliah yg dipilih -->
          </div>
          <!-- ==== pilih matakuliah ==== -->
          <button type="submit" class="btn btn-success d-none tombol-daftar-ppi">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="/js/matakuliah/daftar-ppi.js"></script>
<?= $this->endSection() ?>