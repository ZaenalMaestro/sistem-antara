// ketika tombol edit diklik
const btn_batas_praktikum = getSelector('.ubah-batas-praktikum')
btn_batas_praktikum.addEventListener('click', editBatasPraktikum)


// edit Jadwal
function editBatasPraktikum() {

  const batas_praktikum = getSelector('.input-praktikum-maksimal').value
  if (parseInt(batas_praktikum) < 1) {
    return alert('praktikum minimal 1 matakuliah')
  }if (parseInt(batas_praktikum) > 10) {
    return alert('praktikum tidak boleh lebih dari 10 matakuliah')
  }

  axios.put('/api/bem/praktikum', {
    batas_praktikum
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
        window.location.href = '/bem/data'
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