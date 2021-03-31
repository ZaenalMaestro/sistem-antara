// animasi pindah form
document.addEventListener('click', e => {
  e.preventDefault();  
  if (e.target.classList.contains('link-pindah-form')) {
    // untuk menjalankan fitur pindah form
    toggleForm()

    // hapus pesan error saat pindah form
    removeErrorMessageMoveForm()

    // hapus inputan saat pindah form
    removeInputMoveForm()
  }
})

// mengatur hanya nomor yg bisa dimasukkan di form stambuk
document.querySelectorAll('.validasi-stambuk').forEach(stb => {
  stb.addEventListener('keypress', event => {
    filterChartInput(event, /^[0-9]+$/)
  })
})

// mengatur hanya huruf yg bisa dimasukkan di form stambuk
document.querySelector('#nama-registrasi').addEventListener('keypress', event => {
  filterChartInput(event, /^[A-Za-z .']+$/)
})


// menjalankan fungsi remove error message
removeErrorMessage()

// validasi input ketika tombol login diklik
document.getElementById('tombol-login').addEventListener('click', () => {
  const username = document.getElementById('username')
  const password = document.getElementById('password-login')

  // login jika valid
  if (loginFormValidation(username, password))
  {
    // kirim request login ke server
    axios.post('/api/login', {
      username: username.value,
      password: password.value
    })
      .then(function (response) {
      // simpan respons login - jwt dan role
      const login = {
        role: response.data.role,
        jwt: response.data.jwt,
      }
      
      // simpan token dan role ke local storage
      window.localStorage.setItem('login', JSON.stringify(login));

        // jika role mahasiswa
        // redirect ke URL: /mahasiswa        
        if (response.data.role === 'mahasiswa') return window.location.href = '/mahasiswa'
    })
    .catch(function (error) {
      console.log(error);
    });
  }

  // hapus pesan error saat inputan diperbaharui
  removeErrorMessage()
  
})

// validasi input ketika tombol login diklik
document.getElementById('tombol-registrasi').addEventListener('click', () => {
  const stambuk = document.getElementById('stambuk-registrasi')
  const nama = document.getElementById('nama-registrasi')
  const semester = document.getElementById('semester-registrasi')
  const password = document.getElementById('password-registrasi')
  const konfirmasi_password = document.getElementById('konfirmasi-password-registrasi')

  // return false => registrasi tidak valid
  // return true => registrasi valid
  const inputValid = registrationFormValidation(stambuk, nama, semester, password, konfirmasi_password)

  // registrasi berhasil jika semua inputan valid (true)
  if (inputValid) {
    alert('registrasi berhasil')
    toggleForm()
  }
  
  // menghapus pesan error saat inputan diperbaharui
  removeErrorMessage()
})






