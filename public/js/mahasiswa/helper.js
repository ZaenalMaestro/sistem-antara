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
