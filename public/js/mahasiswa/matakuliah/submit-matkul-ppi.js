const btn_simpan = getClass('tombol-simpan-matakuliah')
btn_simpan.addEventListener('click', simpanMatakuliah)

// simpan matakuliah
function simpanMatakuliah() {
  let daftar_matakuliah = getMatkulTerpilih()
  daftar_matakuliah = daftar_matakuliah.filter(matakuliah => matakuliah[0] != 'MATAKULIAH')
  // get data user yang login JWT
  const login = getTokenLocalStorage()
  const config = {
    headers: { Authorization: `Bearer ${login.jwt}`}
  }
  const body = { belanja_matakuliah: daftar_matakuliah }
  
  axios.post('/api/mahasiswa', body, config)
    .then(function (response) {
      // handle success
      if (response.data.status_code === 200) {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Matakuliah berhasil disimpan',
          showConfirmButton: false,
          timer: 1500
        })
        setTimeout(() => {
          window.location.href = '/mahasiswa/data'
        }, 1700);
      }
    })
    .catch(function (error) {
      // handle error      
      console.log(error);
      updateToken()
      redire
    })
}

// mengambil data matakuliah PPI yang dipilih
function getMatkulTerpilih() {
  let tabel_matakuliah = getId('table-belanja-matakuliah-ppi')

  // mengambil data dari table
  return [...tabel_matakuliah.rows]
    .map(column => [...column.children]
    .map(text => text.innerText))
}

