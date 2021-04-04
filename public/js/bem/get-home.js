const token = getToken()
const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}

axios.get('/api/bem', config)
  .then(function (response) {
    // handle success
    const mendaftar_ppi = response.data
    getSelector('.mendaftar').innerHTML = mendaftar_ppi.mendaftar
    getSelector('.belum-diterima').innerHTML = mendaftar_ppi.belum_diterima
    getSelector('.diterima').innerHTML = mendaftar_ppi.diterima
    getSelector('.ditolak').innerHTML = mendaftar_ppi.ditolak
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    updateToken()
    return window.location.href = '/login'
  })