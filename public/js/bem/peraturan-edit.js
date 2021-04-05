// tampilkan modal ketika tombol edit matakuliah diklik
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('form-ubah')) {
    const id_peraturan = e.target.parentElement.getAttribute('data-id')
    const peraturan = e.target.parentElement.getAttribute('data-peraturan')

    openOneModal(null, null, null, id_peraturan, peraturan)
  }
})

// ketika close modal diklik
const tutup = getSelector('#tutup')
tutup.addEventListener('click', () => closeModal('modal-peraturan'))

// ketika tombol edit diklik
const btn_edit = getSelector('.btn-edit')
btn_edit.addEventListener('click', editPeraturan)


// edit peraturan
function editPeraturan() {
  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }
  
  const id_peraturan = getSelector('#id_peraturan').value
  const peraturan = getSelector('#input-peraturan').value

  axios.put('/api/bem/peraturan', {
    id_peraturan,
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
    // updateToken()
    // return window.location.href = '/login'
  });
}