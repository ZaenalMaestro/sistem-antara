<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Selamat datang di aplikasi pendaftaran PPI Fakultas Ilmu Komputer Universitas Muslim Indonesia
      </h3>
      <div class="card-body">
        <h1 class="card-title text-center">11:38:11</h1>
        <p class="card-text">Batas pendaftaram sampai <span class="text-bold">28 Desember 2022</p>
        <a href="/mahasiswa/daftarppi" class="btn btn-success">Daftar PPI</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>