const token = getToken()
const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}

axios.get('/api/bem/mahasiswa/cetak', config)
  .then(function (response) {
    // handle success
    const mahasiswa = response.data
    console.log(mahasiswa.angkatan)
    updateTabel(mahasiswa.angkatan, mahasiswa.matakuliah)
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })

function updateTabel(angkatan, matakuliah)
{
  const ppi_by_angkatan = document.getElementById('table-cetak')
  let row_angkatan = `
              <tr>
                <th colspan="2" class="text-center">DATA PPI FIKOM UMI</th>
              </tr>
              <tr>
                <th colspan="2" class="text-center"></th>
              </tr>
                <tr>
                  <th>Angkatan</th>
                  <th>Jumlah Mahasiswa PPI</th>
                </tr>`
  angkatan.forEach(row => {
    row_angkatan += `
      <tr>
        <td>${row.tahun}</td>
        <td>${row.jumlah}</td>
      </tr>`
  })

  row_angkatan += `
              <tr>
                <th colspan="2"></th>
              </tr>
              <tr>
                  <th>Matakuliah</th>
                  <th>Jumlah Mahasiswa PPI</th>
              </tr>`
  
  matakuliah.forEach(row => {
    row_angkatan += `
      <tr>
        <td>${row.matakuliah}</td>
        <td>${row.jumlah}</td>
      </tr>`
  })
  
  ppi_by_angkatan.innerHTML = row_angkatan
}
