<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <div class="card card-nav-tabs">
      <h3 class="card-header card-header-info">Form daftar matakuliah PPI
      </h3>
      <div class="card-body mx-4 my-4">
        <form>
          <!-- ==== pilih jumlah matakuliah ==== -->
          <div class="input-container">
            <select name="semester-registrasi" id="pilih-jumlah-matakuliah" style="width: 95%;">
              <option value="0">Pilih jumlah matakuliah</option>
              <?php for($i = 1; $i <9; $i++) : ?>
              <option value="<?= $i ?>"><?= $i ?></option>
              <?php endfor; ?>
            </select>
          </div>

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

<script src="/js/matakuliah/daftar-ppp.js"></script>
<?= $this->endSection() ?>