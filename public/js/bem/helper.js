// cek status login
// jika belum login arahkan kehalaman login
function cekLogin() {
  const login = getToken()
  const config = {
    headers: { Authorization: `Bearer ${login.jwt}`}
  }

  axios.get('/api/bem', config)
    .then(response => response)
    .catch(error => {
      // handle error
      console.log(error);
      redirectToLogin()
    })

  if (login === null) return redirectToLogin()
  if (login === undefined) return redirectToLogin()
  if (login.status_login === false) return redirectToLogin()
  if (login.role !== 'bem') return window.location.href = '/' + login.role

  

  function redirectToLogin() {
    updateToken()
    window.location.href = '/login'
  }
}

// get token
function getToken() {
  const token = JSON.parse(localStorage.getItem('login'))
  if (token === null) updateToken()
  return token
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
function getStambuk() {
  // simpan token dan role ke local storage
  return localStorage.getItem('stambuk');
}

function closeModal(modalSelected) {
  // get modal
  const modal = document.getElementById('tambahMatakuliah')
  const tombol_edit = getSelector('.btn-edit');  
  const tombol_simpan   = getSelector('.btn-simpan');  

  if (modalSelected === 'modal-peraturan') {
    const input_peraturan = getSelector('#input-peraturan')    
    // kosongkan input peraturan
    input_peraturan.value = peraturan = ''
  }
  else {
    const input_matakuliah = getSelector('#matakuliah')
    const input_sks = getSelector('#sks')
  
    // value
    input_matakuliah.value = ''
    input_sks.value = ''
  
  }
  
  // change state like in hidden modal
  tombol_edit.classList.replace('d-block', 'd-none')
  tombol_simpan.classList.replace('d-none', 'd-block')

  // change state like in hidden modal
  modal.classList.remove('show');
  modal.setAttribute('aria-hidden', 'true');
  modal.setAttribute('style', 'display: none');
  modal.style.transition = '1s'
}

function openOneModal(id, matakuliah, sks, get_id_peraturan, peraturan) {
  // get modal
  const modal = document.getElementById('tambahMatakuliah');
  if (id === null) {
    const judul           = document.getElementById('judul');    
    const tombol_edit     = getSelector('.btn-edit');  
    const tombol_simpan   = getSelector('.btn-simpan');  
    const id_peraturan    = getSelector('#id_peraturan')
    const input_peraturan = getSelector('#input-peraturan')
    
    // value
    judul.innerHTML = 'Ubah Peraturan'
    tombol_edit.classList.replace('d-none', 'd-block')
    tombol_simpan.classList.replace('d-block', 'd-none')
    id_peraturan.value     = get_id_peraturan
    input_peraturan.value = peraturan
  }

  if (matakuliah) {
    const judul             = document.getElementById('judul');
    const tombol_edit       = getSelector('.btn-edit');  
    const tombol_simpan     = getSelector('.btn-simpan');
    const id_matakuliah     = getSelector('#id_matakuliah')
    const input_matakuliah  = getSelector('#matakuliah')
    const input_sks         = getSelector('#sks')

    // value
    id_matakuliah.value     = id
    input_matakuliah.value  = matakuliah
    input_sks.value         = sks

    // change state like in hidden modal
    judul.innerHTML= 'Ubah Matakuliah'
    tombol_edit.classList.replace('d-none', 'd-block')
    tombol_simpan.classList.replace('d-block', 'd-none')
  }


  // modal
  modal.classList.add('show');
  modal.removeAttribute('aria-hidden');
  modal.setAttribute('aria-modal', 'true');
  modal.setAttribute('style', 'display: block');
  const body = document.getElementsByTagName('body')[0]
  body.classList.add('modal-open')
  modal.style.transition = '1s eace-in-out'
}

