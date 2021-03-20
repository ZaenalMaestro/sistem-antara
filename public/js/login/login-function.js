// validasi form login
function loginFormValidation(stambuk, password) {
  let validasi = {
    stambuk: true,
    password: true
  }

  // validasi stambuk login
  if (stambuk.value === '') {
    showErrorMessage(stambuk, 'Stambuk tidak boleh kosong !')
    validasi.stambuk = false
  } else if (stambuk.value !== '13020160068') {
    showErrorMessage(stambuk, 'Stambuk tidak valid !')
    validasi.stambuk = false
  } else[
    validasi.stambuk = true
  ]
  
  // validasi password login
  if (password.value === '') {
    showErrorMessage(password, 'Password tidak boleh kosong !')
    validasi.password = false
  } else if (password.value !== '1234qwerty') {
    showErrorMessage(password, 'Password tidak valid !')
    validasi.password = false
  } else{
    validasi.password = true
  }
  
  // convert nilai object ke array
  const validasiForm = Object.values(validasi)

  for (index in validasiForm) {
    // cek jika ada error message return false
    if (validasiForm[index] === false) return false
  }
  // jika tidak ada error message return true
  return true
}

// validasi form registrasi
function registrationFormValidation(stambuk, nama, semester, password, konfirmasi_password) {
  let validasi = {
    stambuk: true,
    nama: true,
    semester: true,
    password: true,
    konfirmasi_password: true
  }
  // validasi konfirmasi password registrasi
  if (konfirmasi_password.value === '') {
    showErrorMessage(konfirmasi_password, 'Konfirmasi password tidak boleh kosong !')
    validasi.konfirmasi_password = false
  } else if (password.value !== konfirmasi_password.value) {
    showErrorMessage(konfirmasi_password, 'Konfiramsi Password tidak cocok !')
    validasi.konfirmasi_password = false
  } else {
    validasi.konfirmasi_password = true
  }

 // validasi password registrasi
  if (password.value === '') {
    showErrorMessage(password, 'Password tidak boleh kosong !')
    validasi.password = false
  } else if (password.value.length < 8) {
    showErrorMessage(password, 'Password minimal 8 karakter !')
    validasi.password = false
  } else {
    validasi.password = true
  }
  
  // validasi semester registrasi
  if (semester.value === '') {
    showErrorMessage(semester, 'Semester tidak boleh kosong !')
    validasi.semester = false
  }else if (semester.value === 'empty') {
    showErrorMessage(semester, 'Semester tidak boleh kosong !')
    validasi.semester = false
  } else {
    validasi.semester = true
  }

  // validasi nama registrasi
  const letter = /^[A-Za-z .']+$/
  if (nama.value === '') {
    showErrorMessage(nama, 'Nama tidak boleh kosong !')
    validasi.nama = false
  }
  else if (!nama.value.match(letter)) {
    showErrorMessage(nama, 'Input karakter tidak valid !')
    validasi.nama = false
  } else {
    validasi.nama = true
  }

  // validasi stambuk registrasi
  if (stambuk.value === '') {
    showErrorMessage(stambuk, 'Stambuk tidak boleh kosong !')
    validasi.stambuk = false
  } else if (stambuk.value == '13020160068') {
    showErrorMessage(stambuk, 'Stambuk telah terdaftar !')
    validasi.stambuk = false
  } else if (stambuk.value.length < 11) {
    showErrorMessage(stambuk, 'Stambuk minimal 11 angka !')
    validasi.stambuk = false
  }  else {
    validasi.stambuk = true
  }
  
  // cek jika ada error message return false
  const validasiForm = Object.values(validasi)
  for (index in validasiForm) {
    if (validasiForm[index] === false) return false
  }

  // jika tidak ada error message return true
  return true
}


// menampilkan pesan error pada form inputan
function showErrorMessage(input, message) {
  input.parentElement.setAttribute('data-error', message)
  input.parentElement.classList.add('error-message')
  input.classList.add('input')
}

// menghilangkan pesan error saat input ulang data di form
function removeErrorMessage() {
  document.querySelectorAll('.input-container.error-message[data-error] .input').forEach(inputElement => {
    inputElement.addEventListener('input', () => {
      inputElement.parentElement.classList.remove('error-message')
      inputElement.classList.remove('input')
    })
  })
}

// hapus pesan error saat pindah form
function removeErrorMessageMoveForm() {
  document.querySelectorAll('.input-container.error-message[data-error] .input').forEach(inputElement => {
    inputElement.parentElement.classList.remove('error-message')
    inputElement.classList.remove('input')
  })
}

// hapus inputan saat pindah form
function removeInputMoveForm() {
  const stambuk = document.getElementById('stambuk-login')
  const password = document.getElementById('password-login')

  const stambuk_registrasi = document.getElementById('stambuk-registrasi')
  const nama = document.getElementById('nama-registrasi')
  const semester = document.getElementById('semester-registrasi')
  const password_registrasi = document.getElementById('password-registrasi')
  const konfirmasi_password = document.getElementById('konfirmasi-password-registrasi')

  // hapus data form login
  stambuk.value = ''
  password.value = ''

  // hapus data form registrasi
  stambuk_registrasi.value = ''
  nama.value = ''
  semester.value = ''
  password_registrasi.value = ''
  konfirmasi_password.value = ''
}


// menghilangkan pesan error saat diklik ulang data di form
function removeErrorMessageOnclick() {
  document.querySelectorAll('.input-container.error-message[data-error] .input').forEach(inputElement => {
    inputElement.addEventListener('clik', () => {
      inputElement.parentElement.classList.remove('error-message')
      inputElement.classList.remove('input')
    })
  })
}

// fungsi untuk menyaring karakter input yang diperbolehkan
function filterChartInput(event, regex) {
  const input = String.fromCharCode(event.which)
  if (!(regex.test(input))) event.preventDefault()
}

// untuk menjalankan fitur pindah form
function toggleForm(){
  const container = document.querySelector('.container')
  container.classList.toggle('active')
}