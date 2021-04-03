// get data user yang login JWT
const login = JSON.parse(localStorage.getItem('login'))
console.log(login)
const config = {
  headers: { Authorization: `Bearer ${login.jwt}`}
}
const body = {key: 'value'}
axios.get('/api/mahasiswa/matakuliah', config)
  .then(function (response) {
    // handle success
    const matakuliah = response.data.matakuliah_diterima
    isiTableMatakuliah(matakuliah)    
  })
  .catch(function (error) {
    // redirect kehalaman login jika user belum diautorisasi
    redirectTo('/login')
  })

function isiTableMatakuliah(matakuliah)
{  
  const table_matakuliah = getSelector('.matakuliah-terkonfirmasi')
  let table_body = ''

  // jika tidak ada matakuliah yang dikonfirmasi
  if (!matakuliah) {
    return table_matakuliah.innerHTML = '<tr><td class="text-center" colspan="3">Belum ada matakuliah yang dikonfirmasi oleh prodi</td></tr>'
  }

  matakuliah.forEach((matkul, nomor)=> {
    table_body += `
    <tr>
      <td>${++nomor}</td>
      <td>${matkul.matakuliah}</td>
      <td>${matkul.sks}</td>
    </tr>`
  });
  // isi table matakuliah yang telah dikonfirmasi oleh prodi
  table_matakuliah.innerHTML = table_body
}