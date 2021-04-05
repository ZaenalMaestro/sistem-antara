const token = getTokenLocalStorage()
console.log(token)

const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}
axios.get('/api/mahasiswa/data', config)
  .then(function (response) {
    // handle success
    // hapus tombol daftar jika telah belanja matakuliah
    console.log(response)
    const matakuliah = response.data.matakuliah_diprogramkan
    if (matakuliah.length > 0) {
      // get element tombol daftar
      const btnDaftar = getSelector('.btn-daftar')
      btnDaftar.remove()
    }
    // hilangkan tombol pendaftaran jika telah tutup
    tutupPendaftaran()
  })
  .catch(function (error) {
    // handle error
    // redirect kehalaman login jika user belum diautorisasi
    console.log(error)
    redirectTo('/login')
  })

