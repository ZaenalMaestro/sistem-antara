axios.get('/api/ppi/sks')
  .then(function (response) {
    // handle success
    const ppi = response.data.batas_sks[0]

    getSelector('.matakuliah-maksimal').innerHTML = ppi.matakuliah_maksimal
    getSelector('.sks-maksimal').innerHTML = ppi.sks_maksimal

    // isi value modal ubah matakuliah dan sks
    getSelector('#id-batas-sks').value = ppi.id_batas_sks
    getSelector('.input-matakuliah-maksimal').value = ppi.matakuliah_maksimal
    getSelector('.input-sks-maksimal').value = ppi.sks_maksimal

    showModalUbahSks(ppi)
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    updateToken()
    return window.location.href = '/login'
  })

function showModalUbahSks() {
  getSelector('.ubah-matkul-sks').addEventListener('click', function () {
    getSelector('#judul').innerHTML = 'Ubah Batas Matakuliah dan SKS'
    getSelector('.form-jadwal').classList.replace('d-block', 'd-none')
    getSelector('.form-matkul-sks').classList.replace('d-none', 'd-block')
  })

  // ketiko tombol close modal diklik
  closeModal()
}

function closeModal() {
  getSelector('#tutup').addEventListener('click', function () {
    getSelector('#judul').innerHTML = 'Ubah jadwal PPI'
    getSelector('.form-jadwal').classList.replace('d-none', 'd-block')
    getSelector('.form-matkul-sks').classList.replace('d-block', 'd-none')
  })
}