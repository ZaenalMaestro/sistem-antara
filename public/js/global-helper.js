function redirectTo(url) {
  // jika belum login redirect kehalaman login
  return window.location.href = url
}

function redirectJikaTelahBelanjaMatakuliah(url) {
  // get data user yang login JWT
const login = JSON.parse(localStorage.getItem('login'))
const config = {
  headers: { Authorization: `Bearer ${login.jwt}`}
}
const body = {key: 'value'}
axios.get('/api/mahasiswa/data', config)
  .then(function (response) {
    const matakuliah = response.data.matakuliah_diprogramkan
    if (matakuliah.length > 0)
    {
      return window.location.href = url
    }
  })
  .catch(function (error) {
    // handle error
    return window.location.href = '/login'
  })
}

function redirectJikaMatakuliahTelahDikonfirmasi(url) {
// get data user yang login JWT
const login = JSON.parse(localStorage.getItem('login'))
const config = {
  headers: { Authorization: `Bearer ${login.jwt}`}
}
const body = {key: 'value'}
axios.get('/api/mahasiswa/data', config)
  .then(function (response) {
    const matakuliah = response.data.matakuliah_diprogramkan
    
    if (matakuliah[0].status_ppi === 'diterima') window.location.href = url
  })
  .catch(function (error) {
    // redirect kehalaman login jika user belum diautorisasi
    redirectTo('/login')
  })
}

// jika belum login kembalikan kehalaman login
function isNotLogin() {
  // get data user yang login JWT
  const login = getTokenLocalStorage()
  const config = {
    headers: { Authorization: `Bearer ${login.jwt}`}
  }
  axios.get('/api/mahasiswa/data', config)
    .then(response => response)
    .catch(error => redirectTo('/login'))
}

function getTokenLocalStorage() {
  // get data user yang login JWT
  const login = JSON.parse(localStorage.getItem('login'))

    // jika token tidak tersedia
  if( login && login === "null" && login === "undefined" ){
    const login = {
      status_login: false,
      role: '',
      jwt: '',
    }  
    // simpan token dan role ke local storage
    window.localStorage.setItem('login', JSON.stringify(login));
    // get default value
    login = JSON.parse(localStorage.getItem('login'))
  }
  return login
}

// logout
function logout() {
  const login = {
    status_login: false,
    role: '',
    jwt: '',
  }  
  // simpan token dan role ke local storage
  window.localStorage.setItem('login', JSON.stringify(login));

  // redirect ke halaman login
  window.location.href = '/login'
}

// jika telah login redirect kehalaman sesuai role user
function cekLogin() {
  const login = getTokenLocalStorage()
  console.log(login)
  if (login.status_login === true) {
    return redirectTo('/' + login.role)
  }
}

// format tanggal indonesia
function formatTangggal(jadwal_ppi) {
  jadwal = jadwal_ppi.split('-');
  
  let [tahun, bulan, tanggal] = jadwal

  if (bulan === '01') bulan  = 'Januari'
  if (bulan === '02') bulan  = 'Ferbruari'
  if (bulan === '03') bulan  = 'Maret'
  if (bulan === '04') bulan  = 'April'
  if (bulan === '05') bulan  = 'Mei'
  if (bulan === '06') bulan  = 'Juni'
  if (bulan === '07') bulan  = 'Juli'
  if (bulan === '08') bulan  = 'Agustus'
  if (bulan === '09') bulan  = 'September'
  if (bulan === '10') bulan = 'Oktober'
  if (bulan === '11') bulan = 'November'
  if (bulan === '12') bulan = 'Desember'

  return `${tanggal} ${bulan} ${tahun}`  
}

// tutup pendaftaran ppi
function tutupPendaftaran() {
  axios.get('/api/ppi/jadwal')
    .then(function (response) {
    console.log(response)
    batas_pendaftaran_ppi = response.data[0].batas_pendaftaran

    // set UI batas pendaftaran
    getSelector('.batas-pendaftaran').innerHTML = formatTangggal(batas_pendaftaran_ppi)
    
    if (cekBatasPendaftaran(batas_pendaftaran_ppi)) {
      // get element tombol daftar
      const btnDaftar = getSelector('.btn-daftar')
      btnDaftar.remove()
    }
  })
  .catch(function (error) {
    console.log(error);
  })
}


function cekBatasPendaftaran(batas_pendaftaran_ppi) {
  // get tanggal saat ini
  const date = new Date()
  const currentDate = date.getDate()
  const currentMonth = date.getMonth()
  const currentYear = date.getFullYear()

  let [tahun, bulan, tanggal] = batas_pendaftaran_ppi.split('-');
  // jika tahun or bulan or tanggal > batas pendaftaran
  if (currentYear < parseInt(tahun)) return false
  if (currentMonth < parseInt(bulan)) return false
  if (currentDate < parseInt(tanggal)) return false
  return true
}

// redirect ke home jika pendaftaran telah ditutp
async function redirectJikaPendaftaranTutup(url) {
  axios.get('/api/ppi/jadwal')
    .then(function (response) {
    console.log('tutup')
    batas_pendaftaran_ppi = response.data[0].batas_pendaftaran
    
    if (cekBatasPendaftaran(batas_pendaftaran_ppi)) {
      redirectTo('/' + url)
    }
  })
  .catch(function (error) {
    console.log(error);
  })
}
