<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- login form css -->
  <!-- <script src="/js/sweetalert2.js"></script> -->
  <link rel="icon" type="image/ico" href="/img/favicons.ico">
  <link rel="stylesheet" href="/css/login.css">

  <title>PPI FIKOM UMI - Login</title>
</head>

<body>
  <section>
    <div class="container">

      <!-- ==== form login ==== -->
      <div class="user signinBx">
        <div class="imgBx"><img src="img/login-fikom.jpg" alt="login-fikom.jpg"></div>
        <div class="formBx">

          <!-- ==== form ==== -->
          <form action="">
            <h2>Login</h2>
            <!-- ==== stambuk ==== -->
            <div class="input-container">
              <input type="text" name="username" id="username" placeholder="Username" maxlength="25">
            </div>

            <!-- ==== password ==== -->
            <div class="input-container">
              <input type="password" name="password-login" id="password-login" placeholder="Password" maxlength="30">
            </div>

            <!-- ==== tombol login ==== -->
            <input type="submit" value="Login" id="tombol-login">

            <!-- ==== link ke form registrasi ==== -->
            <p class="signup">belum ada akun? silahkan <a href="" class="link-pindah-form">registrasi</a></p>
          </form>
          <!-- ==== end form ==== -->

        </div>
      </div>
      <!-- ==== end form login ==== -->

      <!-- ==== form registrasi ==== -->
      <div class="user signupBx">
        <div class="formBx">

          <!-- ==== form ==== -->
          <form action="">
            <h2>registrasi</h2>
            <!-- ==== stambuk ==== -->
            <div class="input-container">
              <input type="text" name="stambuk-registrasi" id="stambuk-registrasi" class="validasi-stambuk"
                placeholder="Stambuk" maxlength="11">
            </div>

            <!-- ==== nama ==== -->
            <div class="input-container">
              <input type="text" name="nama-registrasi" id="nama-registrasi" placeholder="Nama" maxlength="30">
            </div>

            <!-- ==== pilih semester ==== -->
            <div class="input-container">
              <select name="semester-registrasi" id="semester-registrasi">
                <option value="">Semester</option>
                <?php for($i = 1; $i <15; $i++) : ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
              </select>
            </div>

            <!-- ==== password ==== -->
            <div class="input-container">
              <input type="password" name="password-registrasi" id="password-registrasi" placeholder="Password"
                maxlength="30">
            </div>

            <!-- ==== konfirmasi password ==== -->
            <div class="input-container">
              <input type="password" name="konfirmasi-password-registrasi" id="konfirmasi-password-registrasi"
                placeholder="Konfirmasi Password" maxlength="30">
            </div>
            <!-- ==== tombol registrasi ==== -->
            <input type="submit" value="Registrasi" id="tombol-registrasi">
            <!-- ==== link ke form login ==== -->
            <p class="signup">Telah punya akun? silahkan <a href="" class="link-pindah-form">Login</a></p>
          </form>
          <!-- ==== end form ==== -->

        </div>
        <div class="imgBx"><img src="img/registrasi-fikom.jpg" alt="registrasi-fikom.jpg"></div>
      </div>
      <!-- ==== end form registrasi ==== -->

    </div>
  </section>
  
  <script src="/js/axios/dist/axios.min.js"></script>
  <script src="/js/dom-selector.js"></script>
  <script src="/js/login/login-function.js"></script>
  <script src="/js/login/login.js"></script>
  <script src="/js/global-helper.js"></script>
  <script>
    cekLogin()
  </script>
</body>

</html>