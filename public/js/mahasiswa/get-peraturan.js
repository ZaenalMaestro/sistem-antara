// get data user yang login JWT
axios.get('/api/ppi/peraturan')
  .then(function (response) {
    // handle success
    const daftar_peraturan = response.data.daftar_peraturan
    isiDaftarPeraturan(daftar_peraturan)    
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })

function isiDaftarPeraturan(daftar_peraturan)
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