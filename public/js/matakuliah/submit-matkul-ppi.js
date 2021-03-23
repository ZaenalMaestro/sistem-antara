const btn_simpan = getClass('tombol-simpan-matakuliah')
btn_simpan.addEventListener('click', simpanMatakuliah)

// simpan matakuliah
function simpanMatakuliah() {
  console.log(getMatkulTerpilih())
}

// mengambil data matakuliah PPI yang dipilih
function getMatkulTerpilih() {
  let tabel_matakuliah = getId('table-belanja-matakuliah-ppi')

  // mengambil data dari table
  return [...tabel_matakuliah.rows]
    .map(column => [...column.children]
    .map(text => text.innerText))
}

