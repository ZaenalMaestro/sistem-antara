function updateToken() {
  const login = {
    status_login: false,
    role: null,
    jwt: null
  }

  // simpan token dan role ke local storage
  window.localStorage.setItem('login', JSON.stringify(login));
}

// cek status login
// jika belum login arahkan kehalaman login
function cekLogin() {
  const login = getToken()
  const config = {
    headers: { Authorization: `Bearer ${login.jwt}`}
  }

  axios.get('/api/prodi', config)
    .then(response => response)
    .catch(error => {
      // handle error
      console.log(error);
    })

  if (login === null) return redirectToLogin()
  if (login === undefined) return redirectToLogin()
  if (login.status_login === false) return redirectToLogin()
  if (login.role !== 'prodi') return window.location.href = '/' + login.role

  

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