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
   const total_sks = getSelector('.total-sks')
   let table_body = ''
   let sks = 0

      matakuliah.forEach((matkul) => {
      // hilangkan tombol programkan pada table daftar matakuliah
         
      table_body += `
      <tr>
      <td>${matkul.matakuliah}</td>
      <td>${matkul.sks}</td>
      <td class="text-left">
      <button type="button" class="btn btn-warning btn-sm batalkan-matakuliah" data-matakuliah="${matkul.matakuliah}" data-sks="${matkul.sks}">batalkan</button>
      </td>
      </tr>`

      sks += parseInt(matkul.sks);
   });
   // isi table matakuliah
   table_matakuliah.innerHTML = table_body
   total_sks.innerHTML = sks
}
