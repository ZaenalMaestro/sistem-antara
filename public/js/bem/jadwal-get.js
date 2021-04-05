const token = getToken()
const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}

axios.get('/api/bem/jadwal', config)
  .then(function (response) {
    // handle success
    const jadwal_ppi = response.data.jadwal_ppi[0]

    getSelector('.data-mulai-pendaftaran').innerHTML = formatTangggal(jadwal_ppi.mulai_pendaftaran)
    getSelector('.data-batas-pendaftaran').innerHTML = formatTangggal(jadwal_ppi.batas_pendaftaran)
    getSelector('#id-jadwal').value = jadwal_ppi.id_jadwal
    getSelector('#tanggal-pendaftaran').value = jadwal_ppi.mulai_pendaftaran
    getSelector('#batas-pendaftaran').value = jadwal_ppi.batas_pendaftaran
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    updateToken()
    return window.location.href = '/login'
  })