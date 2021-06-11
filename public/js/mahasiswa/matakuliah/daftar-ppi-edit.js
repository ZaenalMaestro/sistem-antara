axios.get('/api/ppi/sks')
  .then(function (response) {
    console.log(response.data)
    const ppi = response.data.batas_sks[0]
    const praktikum = response.data.batas_praktikum[0]
    // handle success
    getSelector('.sks-maksimal').innerHTML = ppi.sks_maksimal
    matakuliahTerpilih(ppi.sks_maksimal, praktikum.batas_praktikum)
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    updateToken()
    return window.location.href = '/login'
  })

function matakuliahTerpilih(batas_sks, praktikum_maksimal) {
  window.localStorage.setItem('jumlah_praktikum', 0);
  window.localStorage.setItem('jumlah_praktikum_update', -1);
  document.addEventListener('click', function (e) {
    if (e.target.classList.contains('matakuliah-terpilih')) {
      const sks = e.target.getAttribute('data-sks')
      if (parseInt(sks) == 1) {
        let jumlah = parseInt(localStorage.getItem('praktikum'));
        jumlah += 1;
        if (jumlah <= praktikum_maksimal) {
          window.localStorage.setItem('praktikum', jumlah);
        } else {
          return alert(`Maksimal ${praktikum_maksimal} matakuliah praktikum`)
        }
      }
      
      console.log(localStorage.getItem('praktikum'))
      // jika praktikum lebih dari dua
      if (parseInt(localStorage.getItem('jumlah_praktikum')) > praktikum_maksimal) {
        return alert(`Maksimal ${praktikum_maksimal} matakuliah praktikum`)
      }
  
      // total sks yang telah dibelanjakan
      let total_sks = getClass('total-sks').innerHTML
      // sks matakuliah yang akan dibelanjakan
      total_sks = parseInt(total_sks)
  
      // hitung ulang total sks saat menambahkan matakuliah baru
      const sks_dibelanjakan = total_sks + parseInt(sks)
  
      // jika sks diatas 16
      if (sks_dibelanjakan > batas_sks) {
        return alert('Matakuliah tidak dapat dibelanjakan karena melebihi batas SKS')
      }
      
      const matakuliah = e.target.getAttribute('data-matakuliah')
      tambahkanMatakuliah(matakuliah, sks)
      e.target.remove()
    }
  })  
}


// menambahkan matakuliah ke table matakuliah ppi terpilih
function tambahkanMatakuliah(matakuliahTerpilih, jumlahSks) {
  let table = document.getElementById('table-belanja-matakuliah-ppi').getElementsByTagName('tbody')[0]
  const tombolSimpanMatakuliah = document.querySelector('.tombol-simpan-matakuliah')

  let totalSks = jumlahkanSks(jumlahSks)

  // // set nilai UI sks diprogramkan
  // sksDiprogramkan.innerHTML = totalSks

  // jika telah ada matakuliah diprogramkan tombol programmkan matakuliah
  if (totalSks > 0) tombolSimpanMatakuliah.classList.replace('d-none', 'd-block')

      // tambah baris baru
  let row = table.insertRow()

  // tambah colom
  // let nomor = row.insertCell(0)
  let matakuliah = row.insertCell(0)
  let sks = row.insertCell(1)
  let aksi = row.insertCell(2)

  // isi data
  // nomor.innerHTML = nomorDinamis()
  matakuliah.innerHTML = matakuliahTerpilih
  sks.innerHTML = jumlahSks

  const tombol = `
    <button type="button" class="btn btn-warning btn-sm batalkan-matakuliah" data-matakuliah="${matakuliahTerpilih}" data-sks="${jumlahSks}">batalkan</button>
  `
  aksi.innerHTML = tombol
}


// menghitung jumlah total sks
function jumlahkanSks (sks){
  let total_sks = getClass('total-sks').innerHTML
  total_sks = parseInt(total_sks)

  const jumlah_sks = total_sks + parseInt(sks)
  updateSks(jumlah_sks)

  return jumlah_sks
}

function updateSks(jumlah_sks) {
  getClass('total-sks').innerHTML = jumlah_sks
  hilangkanTombolSimpan(jumlah_sks)
}



const nomorDinamis = (function () {
  let nomor = 0
  return function () {
    return nomor +=1
  }
})()