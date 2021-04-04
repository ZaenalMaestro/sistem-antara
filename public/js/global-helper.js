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

  if (login.status_login === false) {
    window.location.href = '/login'
  }
  // jika tidak ada token
  if (!login.jwt) return window.location.href = '/login'
  
  const config = {
    headers: { Authorization: `Bearer ${login.jwt}`}
  }

  axios.get('/api/mahasiswa/data', config)
    .then(response => response)
    .catch(error => {
      console.log(error)
      redirectTo('/login')
    })
}

function getTokenLocalStorage() {
  // get data user yang login JWT
  const login = JSON.parse(localStorage.getItem('login'))

    // jika token tidak tersedia
  if(login === null || typeof login === undefined ){
    return window.location.href = '/login'
  }
  return login
}

// logout
function logout() {
  const login = {
    status_login: false,
    role: 'empty',
    jwt: 'empty',
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
  
    //
    countdown(batas_pendaftaran_ppi)
    
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

// 
function countdown(time) {
  // Set the date we're counting down to
  let [year, month, day] = time.split('-')
  day = parseInt(day) + 1
  var countDownDate = new Date(`${year}-${month}-${day}`).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
      
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
      
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
    getSelector(".countdown").innerHTML = `
    <span class="text-info">${days} </span> hari
    <span class="text-info">${hours} </span>jam
    <span class="text-info">${minutes} </span>menit
    <span class="text-warning">${seconds} </span>detik`
      
    // If the count down is over, write some text 
    if (distance < 0) {
      clearInterval(x);
      getSelector(".text-hitung-mundur").innerHTML = "";
      getSelector(".countdown").innerHTML = "PENDAFTARAN PPI TELAH DITUTUP";
    }
  }, 1000);
}