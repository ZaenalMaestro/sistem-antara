<!DOCTYPE html>
<html lang="en">

<!-- ============================= HEAD ============================================ -->

<?= $this->include('layout/partial/head') ?>
<!-- ============================= END HEAD ============================================ -->

<!-- =============================BODY============================================ -->

<body>

  <body class="">
    <div class="wrapper">
      <?= $this->include('layout/partial/sidebar') ?>
      
      <div class="main-panel" data="blue">
        <?= $this->include('layout/partial/navbar') ?>
        
        <div class="content">
          <?= $this->renderSection('content') ?>
        </div>
        <?= $this->include('layout/partial/footer') ?>
      </div>
    </div>
    <?= $this->include('layout/partial/script') ?>
  </body>
  
</body>
<!-- ============================= END BODY ============================================ -->

</html>