const token = getToken()
const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}

axios.get('/api/bem/mahasiswa/cetak', config)
  .then(function (response) {
    // handle success
    const mahasiswa = response.data
    console.log(mahasiswa.data_cetak.length)

    updateTableCetak(mahasiswa.data_cetak)
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    // updateToken()
    // return window.location.href = '/login'
  })

function updateTableCetak(data_cetak) {
  const table_detail = getSelector('#table-cetak')
  if (data_cetak.length === 0) {
    return table_detail.innerHTML = `<tr class="text-center">
                                        <td colspan="3" style="font-style:italic">**Belum pendaftar PPI</td>
                                      </tr>`
  }

  let table_body = ''
  data_cetak.forEach((data, index) => {
    console.log(data_cetak)
    table_body += `
    <tr>
      <td colspan="3"><span style="width: 100px;">Nama</span> <span class="nama">${data.nama}</span></td>
    </tr>
    <tr>
      <td colspan="3"><span style="width: 100px;">Stambuk</span> <span class="stambuk">${data.stambuk}</span></td>
    </tr>
    <tr>
      <td colspan="3"><span style="width: 100px;">Status PPI</span> <span class="status_ppi">${data.status_ppi}</span></td>
    </tr>
    <tr>
      <td colspan="3"><span style="width: 100px;">Semester</span> <span class="semester">${data.semester}</span></td>
    </tr>
    <tr class="text-center">
      <td >Matakuliah</td>
      <td>SKS</td>
    </tr>`
      
    if (data.matakuliah.length === 0) {
      table_body += '<td colspan="2" class="text-center">**Belum belanja matakuliah</td>'
    } else {
      data.matakuliah.forEach((matkul, index) => {
        table_body += `
          <tr>
            <td class="matakuliah">${matkul.matakuliah}</td>
            <td class="sks">${matkul.matakuliah}</td>
          </tr>`
      })      
    }



      
      
    
  });
  table_detail.innerHTML = table_body
}