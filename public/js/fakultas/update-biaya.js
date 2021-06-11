// ketika tombol edit diklik
const btn_update_biaya = getSelector('.btn-update-biaya')
const biaya = getSelector('#biaya-ppi')
btn_update_biaya.addEventListener('click', updateBiaya)


// edit Jadwal
function updateBiaya() {
  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

   if (!biaya.value) biaya.value = 0
  axios.put('/api/fakultas/biaya', {
    biaya: biaya.value
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
   //  updateToken()
   //  return window.location.href = '/login'
  });
}