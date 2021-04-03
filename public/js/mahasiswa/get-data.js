// get data user yang login JWT
const login = JSON.parse(localStorage.getItem('login'))
const config = {
  headers: { Authorization: `Bearer ${login.jwt}`}
}
const body = {key: 'value'}
axios.get('/api/mahasiswa/data', config)
  .then(function (response) {
    // handle success
    const matakuliah = response.data.matakuliah_diprogramkan
    if(matakuliah[0].status_ppi === 'diterima') getSelector('.btn-ubah-matakuliah').remove()
    isiTableMatakuliah(matakuliah)
  })
  .catch(function (error) {
    // jika belum login redirect kehalaman login or token expire or tidak ada token
    redirectTo('/login')
  })

function isiTableMatakuliah(matakuliah)
{  
  const table_matakuliah = getSelector('.daftar-matakuliah')
  let table_body = ''

  // jika tidak ada matakuliah yang dikonfirmasi
  if (!matakuliah) {
    return table_matakuliah.innerHTML = '<tr><td class="text-center" colspan="3">Matakuliah Telah dikonfirmasi oleh prodi</td></tr>'
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