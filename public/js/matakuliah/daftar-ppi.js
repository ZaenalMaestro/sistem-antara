// pilih matakuliah
document.querySelectorAll('.matakuliah-terpilih').forEach(row => {
  row.addEventListener('click', function () {
    const sks = this.getAttribute('data-sks')
    const matakuliah = this.getAttribute('data-matakuliah')
    tambahkanMatakuliah(matakuliah, sks)
    row.remove()
  })
})


// menambahkan matakuliah ke table matakuliah ppi terpilih
function tambahkanMatakuliah(matakuliahTerpilih, jumlahSks) {
  let table = document.getElementById('table-belanja-matakuliah-ppi')
  const tombolSimpanMatakuliah = document.querySelector('.tombol-simpan-matakuliah')

  let sksDiprogramkan = document.querySelector('.total-sks')
  let totalSks = sksMaksimal(jumlahSks)

  // set nilai UI sks diprogramkan
  sksDiprogramkan.innerHTML = totalSks

  // jika tampilan ui sks diprogramkan > 16 ubah jadi 16
  if (totalSks > 16) {
    sksDiprogramkan.innerHTML = 16
  }

  // jika telah ada matakuliah diprogramkan tombol programmkan matakuliah
  if (table.rows.length > 0) tombolSimpanMatakuliah.classList.replace('d-none', 'd-block')

  if (totalSks <=16) {
      // tambah baris baru
    let row = table.insertRow()

    // tambah colom
    let nomor = row.insertCell(0)
    let matakuliah = row.insertCell(1)
    let sks = row.insertCell(2)
    let aksi = row.insertCell(3)

    // isi data
    nomor.innerHTML = nomorDinamis()
    matakuliah.innerHTML = matakuliahTerpilih
    sks.innerHTML = jumlahSks

    const tombol = `
      <button type="button" class="btn btn-warning btn-sm batalkan-matakuliah" style="margin-left:65px" data-matakuliah="${matakuliahTerpilih}" data-sks="${jumlahSks}">batalkan</button>
    `
    aksi.innerHTML = tombol
  }

  
}

// menghitung jumlah total sks
const sksMaksimal = ((jumlahSks) => {
  let sks = 0
  return function (jumlahSks) {
    if (sks <= 16) sks = sks + parseInt(jumlahSks)    
    return sks
  }
})()



const nomorDinamis = (function () {
  let nomor = 0
  return function () {
    return nomor +=1
  }
})()