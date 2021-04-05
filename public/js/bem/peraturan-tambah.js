const btn_simpan = getSelector('.btn-simpan')
btn_simpan.addEventListener('click', tambahPeraturan)

function tambahPeraturan() {
  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

  const peraturan = getSelector('#input-peraturan').value

  axios.post('/api/bem/peraturan', {
    peraturan
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
        window.location.href = '/bem/peraturan'
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