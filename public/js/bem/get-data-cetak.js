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
    updateToken()
    return window.location.href = '/login'
  })

function updateTableCetak(data_cetak) {
  const table_detail = getSelector('#table-cetak')
  if (data_cetak.length === 0) {
    return table_detail.innerHTML = `<tr class="text-center">
                                        <td colspan="3" style="font-style:italic">**Belum pendaftar PPI</td>
                                      </tr>`
  }

  let table_body = `<tr style="font-weight:bolder" class="text-left">
                      <th colspan="3" class="text-center text-info"><b>DAFTAR MAHASISWA PPI - FIKOM UMI</b></th>
                    </tr>`
  data_cetak.forEach((data, index) => {
    console.log(data_cetak)
    table_body += `
    <tr style="font-weight:bolder">
      <td><b>Nama</b></td>
      <td class="text-center"><b>:</b></td>
      <td><b>&nbsp;${data.nama}</b></td>
    </tr>
    <tr style="font-weight:bolder">
      <td><b>Stambuk</b></td>
      <td class="text-center"><b>:</b></td>
      <td><b>&nbsp;${data.stambuk.toString()}</b></td>
    </tr>
    <tr style="font-weight:bolder">
      <td><b>Status PPI</b></td>
      <td class="text-center"><b>:</b></td>
      <td><b>&nbsp;${data.status_ppi}</b></td>
    </tr>
    <tr style="font-weight:bolder">
      <td><b>Semester</b></td>
      <td class="text-center"><b>:</b></td>
      <td><b>&nbsp;${data.semester.toString()}</b></td>
    </tr>
    <tr class="text-center">
      <td style="font-weight:bolder"><b>No.</b></td>
      <td style="font-weight:bolder"><b>Matakuliah</b></td>
      <td style="font-weight:bolder"><b>SKS</b></td>
    </tr>`
      
    if (data.matakuliah.length === 0) {
      table_body += `
            <td colspan="3" class="text-center">
              <span style="color: grey"> ~BELUM ADA MATAKULIAH PPI YANG DIPROGRAMKAN ~</span>
            </td >`
    } else {
      data.matakuliah.forEach((matkul, index) => {
        let nomor = ++index;
        table_body += `
          <tr>
            <td class="matakuliah">&nbsp;${nomor.toString()}. </td>
            <td class="matakuliah">${matkul.matakuliah}</td>
            <td class="sks">${matkul.sks.toString()} SKS</td>
          </tr>`
      })      
    }

    table_body += `
      <tr>
        <td colspan="3" class="my-3"></td>
      </tr>
      <tr>
        <td colspan="3" class="my-3"></td>
      </tr>
      <tr>
        <td colspan="3" class="my-3"></td>
      </tr>`



      
      
    
  });
  table_detail.innerHTML = table_body
}