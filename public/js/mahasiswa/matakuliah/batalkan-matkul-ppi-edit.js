window.onload = () => {
  document.addEventListener('click', batalkanMatkul)
  let daftar_matakuliah = getMatkulTerpilih()
  daftar_matakuliah = daftar_matakuliah.filter(matakuliah => matakuliah[0] != 'MATAKULIAH')

  let praktikum = 0;
  daftar_matakuliah.forEach(row => {
    if (row[1] == '1') {
      praktikum+= 1
    }
  })
  localStorage.setItem('praktikum', praktikum)
}


function batalkanMatkul(e) {
  if (e.target.classList.contains('batalkan-matakuliah')) {
    const row = e.target.parentElement.parentElement
    const matakuliah = e.target.getAttribute('data-matakuliah')
    const sks = e.target.getAttribute('data-sks')

    if (sks == '1') {
      let jumlahPraktikum = parseInt(localStorage.getItem('praktikum'))
      jumlahPraktikum -= 1
      localStorage.setItem('praktikum', jumlahPraktikum)
    }

    console.log(localStorage.getItem('praktikum'))
    // kuramgi jumlah sks jika tombol batalkan diklik
    kurangiSks(sks)

    // tampilkan kembali tombol programkan matakuliah
    // di table pilih matakuliah
    tampilkanTombolProgramkan(matakuliah, sks)

    // hapus baris matakuliah yang dibatalkan
    row.remove()
    
    
    // hapus tombol batalkan
  }
}

function tampilkanTombolProgramkan(matakuliah, sks) {
  const tombol_programkan_matkul = `
  <div class="${matakuliah.replace(/\s/g, "-")}">
    <button type="button" class="btn btn-info btn-sm matakuliah-terpilih" data-matakuliah="${matakuliah}" data-sks="${sks}">programkan</button>
  </div>`;

  let class_matakuliah = matakuliah.replace(/\s/g, "-")
  const kolom_aksi = getClass(class_matakuliah)
  kolom_aksi.innerHTML = tombol_programkan_matkul;
}

// menghitung jumlah total sks
function kurangiSks (sksBatal){
  let total_sks = getClass('total-sks').innerHTML
  total_sks = parseInt(total_sks)

  const sisa_sks = total_sks - parseInt(sksBatal)
  updateSks(sisa_sks)
}

function updateSks(sisa_sks) {
  getClass('total-sks').innerHTML = sisa_sks
  hilangkanTombolSimopan(sisa_sks)
}

function hilangkanTombolSimopan(sisa_sks) {
  if (sisa_sks == 0) getClass('tombol-simpan-matakuliah').classList.replace('d-block', 'd-none')
}

function getMatkulTerpilih() {
  let tabel_matakuliah = getId('table-belanja-matakuliah-ppi')

  // mengambil data dari table
  return [...tabel_matakuliah.rows]
    .map(column => [...column.children]
    .map(text => text.innerText))
}
