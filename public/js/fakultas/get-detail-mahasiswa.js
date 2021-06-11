const token = getToken()
const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}

// get stambuk 
const stambuk = getStambuk()

axios.get(`/api/fakultas/mahasiswa/${stambuk}`, config)
  .then(function (response) {
    // handle success
    const mahasiswa = response.data
    let total_sks = 0
    mahasiswa.matakuliah_ppi.forEach(row => {
      total_sks += parseInt(row.sks)
    })
    let biaya_ppi = total_sks * parseInt(mahasiswa.biaya_ppi)

    // tampilkan tombol konfirmasi dan tolak
    getSelector('.btn-konfirmasi').classList.remove('d-none')
    getSelector('.btn-tolak').classList.remove('d-none')

    if (mahasiswa.status_ppi === 'diverifikasi' || mahasiswa.status_ppi === 'ditolak') {
      getSelector('.btn-konfirmasi').remove()
      getSelector('.btn-tolak').remove()
    }
    // set nama
    getSelector('.nama').innerHTML = mahasiswa.nama
    getSelector('.stambuk').innerHTML = mahasiswa.stambuk
    getSelector('.total-sks').innerHTML = total_sks + ' SKS'
    getSelector('.biaya-ppi').innerHTML = formatRupiah(biaya_ppi)

    updateTableDetail(mahasiswa.matakuliah_ppi)
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    // updateToken()
    // return window.location.href = '/login'
  })

function updateTableDetail(matakuliah) {
  const table_detail = getSelector('.table-detail-mahasiswa')
  if (matakuliah.length === 0) {
    getSelector('.btn-konfirmasi').remove()
    getSelector('.btn-tolak').remove()
    return table_detail.innerHTML = `<tr class="text-center">
                                        <td colspan="3" style="font-style:italic">**Belum ada matakuliah yang diprogramkan</td>
                                      </tr>`
  }

  let table_body = ''
  matakuliah.forEach((matkul, index) => {
    table_body += `<tr>
                    <td class="text-center">${++index}</td>
                    <td class="text-left">${matkul.matakuliah}</td>
                    <td class="text-left">${matkul.sks}</td>
                  </tr>`
  });
  table_detail.innerHTML = table_body
}

/* Fungsi formatRupiah */
function formatRupiah(angka){
  var	number_string = angka.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }
  return 'Rp. ' + rupiah
}