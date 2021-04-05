// tampilkan modal ketika tombol edit matakuliah diklik
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('btn-ubah-matakuliah')) {
    const id_matakuliah = e.target.getAttribute('data-id')
    const matakuliah = e.target.getAttribute('data-matkul')
    const sks = e.target.getAttribute('data-sks')

    openOneModal(id_matakuliah, matakuliah, sks)
  }
})

// ketika close modal diklik
const tutup = getSelector('#tutup')
tutup.addEventListener('click', closeModal)

// ketika tombol edit diklik
const btn_edit = getSelector('.btn-edit')
btn_edit.addEventListener('click', editMatakuliah)


// edit matakuliah
function editMatakuliah() {
  const id_matakuliah = getSelector('#id_matakuliah').value
  const input_matakuliah = getSelector('#matakuliah').value
  const input_sks = getSelector('#sks').value

  const token = getToken()
  console.log(token, id_matakuliah, input_matakuliah, input_sks)
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }

  axios.put('/api/bem/matakuliah', {
    id_matakuliah,
    matakuliah: input_matakuliah,
    sks: input_sks
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


