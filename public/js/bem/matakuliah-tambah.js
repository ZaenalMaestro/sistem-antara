const btn_simpan = getSelector('.btn-simpan')
btn_simpan.addEventListener('click', tambahMatakuliah)

function tambahMatakuliah() {
  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

  const matakuliah = getSelector('#matakuliah').value
  const sks = getSelector('#sks').value
  console.log(matakuliah, sks)

  axios.post('/api/bem/matakuliah', {
    matakuliah,
    sks
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
        window.location.href = '/bem/matakuliah'
      }, 2300);
    }
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    updateToken()
    return window.location.href = '/login'
  });
}