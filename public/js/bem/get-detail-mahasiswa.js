const token = getToken()
const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}

// get stambuk 
const stambuk = getStambuk()

axios.get(`/api/bem/mahasiswa/${stambuk}`, config)
  .then(function (response) {
    // handle success
    const mahasiswa = response.data
    // set nama
    getSelector('.nama').innerHTML = mahasiswa.nama
    getSelector('.stambuk').innerHTML = mahasiswa.stambuk

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