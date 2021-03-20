// mengambil jumlah matakuliah yang dipilih

const pilihJumlahMatakuliah = document.querySelector('#pilih-jumlah-matakuliah')
pilihJumlahMatakuliah.addEventListener('change', function () {
  const jumlahMatakuliah = this.value  
  updateJumlahInputMatakuliah(jumlahMatakuliah)  
})

// untuk menampilkan input pilih matakuliah secara dinamis
function updateJumlahInputMatakuliah(jumlahMatakuliah) {
  const pilihMatakuliah = document.querySelector('.pilih-matakuliah')
  const tombolSubmit = document.querySelector('.tombol-daftar-ppi')
  let formInputMatakuliah = ''
  if (jumlahMatakuliah == 0) {
    tombolSubmit.classList.replace('d-block', 'd-none')
    pilihMatakuliah.innerHTML = ''
  } else {
    tombolSubmit.classList.replace('d-none', 'd-block')

    formInputMatakuliah += `<h4 class="mt-3 mb-2">Pilih Matakuliah</h4>`
    for (let i = 1 ; i <= jumlahMatakuliah; i++) {
      formInputMatakuliah += `
        <div class="input-container" id="${i}">
            <select name="semester-registrasi" id="semester-registrasi" style="width: 95%;">
              <option value="">Pilih matakuliah</option>
              <?php for($i = 1; $i <9; $i++) : ?>
              <option value="<?= $i ?>">Javascript</option>
              <option value="<?= $i ?>">Express js</option>
              <?php endfor; ?>
            </select>
            <button data-id="${i}" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon ml-2 hapus-input">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </div>
        `;
    }
    // update ui form pilih matakuliah
    pilihMatakuliah.innerHTML = formInputMatakuliah
  }
}


// hapus inputan matakuliah saat tombol hapus diklik
document.addEventListener('click', e => {
  const btnHapusInput = e.target.parentElement.classList.contains('hapus-input')
  if (btnHapusInput) {
    // jika user konfirmasi untuk hapus maka hapus inpuatan
    if (confirm('yakin hapus inputan ?')) {
      const id = e.target.parentElement.getAttribute('data-id')
      document.getElementById(id).remove()
      const input = document.querySelectorAll('.input-container')
      console.log(input.length)
      if (input.length == 1) {
        console.log('oke')
        document.querySelector('.tombol-daftar-ppi').classList.replace('d-block', 'd-none')
        document.querySelector('.pilih-matakuliah').innerHTML = ''
      }
    }    
  }
})