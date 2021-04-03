// get data user yang login JWT
const login = JSON.parse(localStorage.getItem('login'))
const config = {
  headers: { Authorization: `Bearer ${login.jwt}`}
}
const body = {key: 'value'}
axios.get('/api/mahasiswa/data', config)
  .then(function (response) {
    // handle success
    
    // hapus tombol belanja matakuliah jika ada matakuliah
    // yang telah dibelanjakan
    const matakuliah = response.data.matakuliah_diprogramkan
    if (matakuliah.length > 0)
    {
      const btnDaftar = getSelector('.btn-daftar')
      btnDaftar.remove()
    }
  })
  .catch(function (error) {
    // handle error
    // redirect kehalaman login jika user belum diautorisasi
    redirectTo('/login')
  })