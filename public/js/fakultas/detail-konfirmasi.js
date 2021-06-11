// ketika tombol edit diklik
const btn_konfirmasi = getSelector('.btn-konfirmasi')
btn_konfirmasi.addEventListener('click', konfirmasi)


// edit Jadwal
function konfirmasi() {
  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

  axios.put('/api/fakultas/mahasiswa', {
    stambuk: getStambuk(),
    status_ppi: 'diverifikasi'
  }, config)
  .then(function (response) {
    if (response.data.status_code === 200) {
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: response.data.pesan,
        showConfirmButton: false,
        timer: 2000
      })
      setTimeout(() => {
        window.location.href = '/fakultas/data'
      }, 2300);
    }
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    // updateToken()
    // return window.location.href = '/login'
  });
}