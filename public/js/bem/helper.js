// cek status login
// jika belum login arahkan kehalaman login
function cekLogin() {
  const login = JSON.parse(localStorage.getItem('login'))

  if (login === null) return window.location.href = '/login'
  if (login.status_login === false) return window.location.href = '/login'
  if (login.role !== 'bem') return window.location.href = '/' + login.role
}

// get token
function getToken() {
  return JSON.parse(localStorage.getItem('login'))
}

// updateToken
function updateToken() {
  const login = {
    status_login: false,
    role: null,
    jwt: null
  }

  // simpan token dan role ke local storage
  window.localStorage.setItem('login', JSON.stringify(login));
}

// set stambuk untuk get detail mahasiswa berdasarkan stambuk
function setStambuk(stb) {
  const stambuk = stb

  // simpan token dan role ke local storage
  window.localStorage.setItem('stambuk', stambuk);
}

// get stambuk untuk mendapatkan detail mahasiswa berdasarkan stambuk
function getStambuk(stb) {
  const stambuk = stb

  // simpan token dan role ke local storage
  return localStorage.getItem('stambuk');
}

