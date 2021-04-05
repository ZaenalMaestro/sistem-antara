// tampilkan modal ketika tombol edit matakuliah diklik
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('btn-hapus')) {
    // tampilkan modal konfiramsi hapus
    if (!confirm('Yakin Hapus peraturan?')) return false

    const id_peraturan = e.target.parentElement.getAttribute('data-id')
    hapusPeraturan(id_peraturan)
  }
})

// edit peraturan
async function hapusPeraturan(id_peraturan) {
  const token = getToken()
  const config = {
    headers: { Authorization: `Bearer ${token.jwt}`}
  }
  try {
    const response = await axios({
      method: 'DELETE',
      url: '/api/bem/peraturan',
      data: { id_peraturan },
      headers: { Authorization: `Bearer ${token.jwt}`}
    })

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
  } catch (error) {
    // handle error
    console.log(error);
    updateToken()
    return window.location.href = '/login'
  }
  
}