const token = getTokenLocalStorage()

const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}

const body = { key: 'value' }

axios.get('/api/mahasiswa/data', config)
  .then(function (response) {
    // handle success
    const matakuliah = response.data.matakuliah_diprogramkan

    if (matakuliah.length > 0 && matakuliah[0].status_ppi === 'diterima') {
      getSelector('.btn-ubah-matakuliah').remove()
    }
    // isi table data matakuliah mahasiswa
    isiTableMatakuliah(matakuliah)
  })
  .catch(function (error) {
    // jika belum login redirect kehalaman login or token expire or tidak ada token
    console.log(error)
    // redirectTo('/login')
  })

function isiTableMatakuliah(matakuliah)
{
  if (matakuliah.length == 0) {
    
    if (!matakuliah) {
      
    }
  }

  const table_matakuliah = getSelector('.daftar-matakuliah')
  let table_body = ''

  // jika tidak ada matakuliah yang dikonfirmasi
  if (matakuliah.length === 0) {
    getSelector('.btn-ubah-matakuliah').remove()
    return table_matakuliah.innerHTML = `
      <tr>
        <td class="text-center" colspan="4">
          Belum ada matakuliah yang belanjakan
      </tr>`
  }

  matakuliah.forEach((matkul, nomor)=> {
    table_body += `
    <tr>
      <td>${++nomor}</td>
      <td>${matkul.matakuliah}</td>
      <td>${matkul.sks}</td>
      <td class="text-center">
        <span class="badge badge-${matkul.status_ppi == 'diterima' ? 'success' : 'warning'} badge-md">${matkul.status_ppi}</span>
      </td>
    </tr>`
  });
  // isi table matakuliah
  table_matakuliah.innerHTML = table_body
}