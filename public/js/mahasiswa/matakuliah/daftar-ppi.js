// // pilih matakuliah
// document.querySelectorAll('.matakuliah-terpilih').forEach(row => {
//   row.addEventListener('click', function () {
//     const sks = this.getAttribute('data-sks')
//     const matakuliah = this.getAttribute('data-matakuliah')
//     tambahkanMatakuliah(matakuliah, sks)
//     row.remove()
//   })
// })


document.addEventListener('click', function(e) {
  if (e.target.classList.contains('matakuliah-terpilih')) {
    const sks = e.target.getAttribute('data-sks')
    const matakuliah = e.target.getAttribute('data-matakuliah')
    tambahkanMatakuliah(matakuliah, sks)
    e.target.remove()
  }
})


// menambahkan matakuliah ke table matakuliah ppi terpilih
function tambahkanMatakuliah(matakuliahTerpilih, jumlahSks) {
  let table = document.getElementById('table-belanja-matakuliah-ppi').getElementsByTagName('tbody')[0]
  const tombolSimpanMatakuliah = document.querySelector('.tombol-simpan-matakuliah')

  let sksDiprogramkan = document.querySelector('.total-sks')
  let totalSks = jumlahkanSks(jumlahSks)

  // // set nilai UI sks diprogramkan
  // sksDiprogramkan.innerHTML = totalSks

  // jika tampilan ui sks diprogramkan > 16 ubah jadi 16
  if (totalSks > 16) {
    sksDiprogramkan.innerHTML = 16
  }

  // jika telah ada matakuliah diprogramkan tombol programmkan matakuliah
  if (totalSks > 0) tombolSimpanMatakuliah.classList.replace('d-none', 'd-block')

  if (totalSks <=16) {
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
  hilangkanTombolSimopan(jumlah_sks)
}



const nomorDinamis = (function () {
  let nomor = 0
  return function () {
    return nomor +=1
  }
})()