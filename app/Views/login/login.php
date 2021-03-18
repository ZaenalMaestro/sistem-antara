<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- login form css -->
  <link rel="stylesheet" href="/css/login.css">
  <title>Login</title>
</head>

<body>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="img/img_3115.jpg" alt="img_3115.jpg"></div>
        <div class="formBx">
          <form action="">
            <h2>Login</h2>
            <input type="text" name="stambuk" class="stambuk" placeholder="Stambuk" maxlength="11">
            <input type="password" name="password" placeholder="Password" maxlength="50">
            <input type="submit" value="Login">
            <p class="signup">belum ada akun? silahkan <a href="" class="link-pindah-form">registrasi</a></p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
        <div class="formBx">
          <form action="">
            <h2>registrasi</h2>
            <!-- ==== stambuk ==== -->
            <input type="text" name="stambuk" class="stambuk-registrasi" placeholder="Stambuk" maxlength="11">

            <!-- ==== nama ==== -->
            <input type="text" name="nama" placeholder="Nama" maxlength="30">

            <!-- ==== nama ==== -->
            <select name="semester">
              <option>Semester</option>
              <?php for($i = 1; $i <15; $i++) : ?>
              <option value="1"><?= $i ?></option>
              <?php endfor; ?>
            </select>

            <!-- ==== password ==== -->
            <input type="password" name="password" id="" placeholder="Password" maxlength="50">

            <!-- ==== konfirmasi password ==== -->
            <input type="password" name="konfirmasiPassword" id="" placeholder="Konfirmasi Password" maxlength="50">

            <!-- ==== tombol registrasi ==== -->
            <input type="submit" value="Registrasi">
            <p class="signup">Telah punya akun? silahkan <a href="" class="link-pindah-form">Login</a></p>
          </form>
        </div>
        <div class="imgBx"><img src="img/bg5.jpg" alt="img_3115.jpg"></div>
      </div>
    </div>
  </section>
  <script src="/js/login.js"></script>
</body>

</html>