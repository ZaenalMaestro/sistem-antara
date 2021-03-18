<div class="sidebar" data="blue">
  <!--  Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red" -->
  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="javascript:void(0)" class="simple-text logo-normal">
        Menu Mahasiswa
      </a>
    </div>
    <ul class="nav">
    <!-- ============= home ============ -->
      <li class="<?= ($activeURL == 'home') ? 'active' : '' ?>">
        <a href="/mahasiswa">
          <i class="tim-icons icon-chart-pie-36"></i>
          <p>Home</p>
        </a>
      </li>

      <!-- ============= data ============ -->
      <li class="<?= ($activeURL == 'data') ? 'active' : '' ?>">
        <a href="/mahasiswa/data">
          <i class="tim-icons icon-atom"></i>
          <p>Data</p>
        </a>
      </li>

      <!-- ============= matakuliah ============ -->
      <li class="<?= ($activeURL == 'matakuliah') ? 'active' : '' ?>">
        <a href="/mahasiswa/matakuliah">
          <i class="tim-icons icon-bullet-list-67"></i>
          <p>Matakuliah</p>
        </a>
      </li>

      <!-- ============= peraturan ============ -->
      <li class="<?= ($activeURL == 'peraturan') ? 'active' : '' ?>">
        <a href="/mahasiswa/peraturan">
          <i class="tim-icons icon-alert-circle-exc"></i>
          <p>Peraturan</p>
        </a>
      </li>
      
      
    </ul>
  </div>
</div>