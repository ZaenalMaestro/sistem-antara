// get data user yang login JWT
const login = JSON.parse(localStorage.getItem('login'))
console.log(login)
const config = {
  headers: { Authorization: `Bearer ${login.jwt}`}
}
const body = {key: 'value'}
axios.get('/api/mahasiswa/data', config)
  .then(function (response) {
    // handle success
    const matakuliah = response.data.matakuliah_diprogramkan
    isiTableMatakuliah(matakuliah)    
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })

function isiTableMatakuliah(matakuliah)
{  
  const table_matakuliah = getSelector('.daftar-matakuliah')
  let table_body = ''

  matakuliah.forEach((matkul, nomor)=> {
    table_body += `
    <tr>
      <td>${++nomor}</td>
      <td>${matkul.matakuliah}</td>
      <td>${matkul.sks}</td>
      <td class="text-center">
        <span class="badge badge-warning badge-md">menunggu</span>
      </td>
    </tr>`
  });
  // isi table matakuliah
  table_matakuliah.innerHTML = table_body
}