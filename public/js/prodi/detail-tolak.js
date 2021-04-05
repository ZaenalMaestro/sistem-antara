// ketika tombol edit diklik
const btn_tolak = getSelector('.btn-tolak')
btn_tolak.addEventListener('click', tolak)


// edit Jadwal
function tolak() {
  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

  axios.put('/api/prodi/mahasiswa', {
    stambuk: getStambuk(),
    status_ppi: 'ditolak'
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
        window.location.href = '/prodi/data'
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