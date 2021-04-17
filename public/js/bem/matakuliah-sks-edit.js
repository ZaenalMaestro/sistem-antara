// ketika tombol edit diklik
const btn_edit_matkul_sks = getSelector('.btn-ubah-sks-matkul')
btn_edit_matkul_sks.addEventListener('click', editBatasMatkulSks)


// edit Jadwal
function editBatasMatkulSks() {

  const id_batas_sks = getSelector('#id-batas-sks').value
  const matakuliah_maksimal = getSelector('.input-matakuliah-maksimal').value
  const sks_maksimal = getSelector('.input-sks-maksimal').value

  console.log(id_batas_sks, matakuliah_maksimal, sks_maksimal)

  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

  axios.put('/api/bem/sks', {
   id_batas_sks,
   matakuliah_maksimal,
   sks_maksimal
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