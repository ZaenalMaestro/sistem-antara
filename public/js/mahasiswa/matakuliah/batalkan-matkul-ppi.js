window.onload = () => {
  document.addEventListener('click', batalkanMatkul)
}


function batalkanMatkul(e) {
  if (e.target.classList.contains('batalkan-matakuliah')) {
    const row = e.target.parentElement.parentElement
    const matakuliah = e.target.getAttribute('data-matakuliah')
    const sks = e.target.getAttribute('data-sks')

    if (parseInt(sks) == 1) {
      let jumlah = parseInt(localStorage.getItem('jumlah_praktikum'));
      jumlah -= 1;
      window.localStorage.setItem('jumlah_praktikum', jumlah);
    }
    console.log(localStorage.getItem('jumlah_praktikum'))
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
