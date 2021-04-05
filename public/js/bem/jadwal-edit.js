// ketika tombol edit diklik
const btn_edit = getSelector('.btn-ubah')
btn_edit.addEventListener('click', editJadwal)


// edit Jadwal
function editJadwal() {

  const id_jadwal = getSelector('#id-jadwal').value
  const mulai_pendaftaran = getSelector('#tanggal-pendaftaran').value
  const batas_pendaftaran = getSelector('#batas-pendaftaran').value

  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

  axios.put('/api/bem/jadwal', {
    id_jadwal,
    mulai_pendaftaran,
    batas_pendaftaran
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