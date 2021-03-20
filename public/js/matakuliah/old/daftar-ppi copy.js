// mengambil jumlah matakuliah yang dipilih

const pilihJumlahMatakuliah = document.querySelector('#pilih-jumlah-matakuliah')
pilihJumlahMatakuliah.addEventListener('change', function () {
  const jumlahMatakuliah = this.value  
  updateJumlahInputMatakuliah(jumlahMatakuliah)  
})

// untuk menampilkan input pilih matakuliah secara dinamis
// function updateJumlahInputMatakuliah(jumlahMatakuliah) {
//   const pilihMatakuliah = document.querySelector('.pilih-matakuliah')
//   const tombolSubmit = document.querySelector('.tombol-daftar-ppi')
//   let formInputMatakuliah = ''
//   if (jumlahMatakuliah == 0) {
//     tombolSubmit.classList.replace('d-block', 'd-none')
//     pilihMatakuliah.innerHTML = ''
//   } else {
//     tombolSubmit.classList.replace('d-none', 'd-block')

//     formInputMatakuliah += `<h4 class="mt-3 mb-2">Pilih Matakuliah</h4>`
//     for (let i = 1 ; i <= 8; i++) {
//       formInputMatakuliah += `
//         <div class="input-container" id="${i}">
//             <select class="input-matakuliah" name="semester-registrasi" id="semester-registrasi${i}" style="width: 95%;">
//               <option value="">Pilih matakuliah</option>
//               <option value="javascript" data-sks="3">Javascript</option>
//               <option value="express" data-sks="2">Express js</option>
//               <?php endfor; ?>
//             </select>
//             <button data-id="${i}" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon ml-2 hapus-input">
//               <i class="tim-icons icon-simple-remove"></i>
//             </button>
//           </div>
//         `;
//     }

//     formInputMatakuliah += `<p class="mt-5 mb-2 text-right mr-4"><b>Jumlah SKS : 0</b></p>`
//     // update ui form pilih matakuliah
//     pilihMatakuliah.innerHTML = formInputMatakuliah
//   }
// }

// untuk menampilkan input pilih matakuliah secara dinamis
function updateJumlahInputMatakuliah() {
  const pilihMatakuliah = document.querySelector('.pilih-matakuliah')
  const tombolSubmit = document.querySelector('.tombol-daftar-ppi')
  let formInputMatakuliah = ''
  
    tombolSubmit.classList.replace('d-none', 'd-block')

    formInputMatakuliah += `<h4 class="mt-3 mb-2">Pilih Matakuliah</h4>`
    for (let i = 1 ; i <= 8; i++) {
      formInputMatakuliah += `
        <div class="input-container" id="${i}">
            <select class="input-matakuliah" name="semester-registrasi" id="semester-registrasi${i}" style="width: 95%;">
              <option value="">Pilih matakuliah</option>
              <option value="javascript" data-sks="3">Javascript</option>
              <option value="express" data-sks="2">Express js</option>
              <?php endfor; ?>
            </select>
            <button data-id="${i}" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon ml-2 hapus-input">
              <i class="tim-icons icon-simple-remove"></i>
            </button>
          </div>
        `;
    }

    formInputMatakuliah += `<p class="mt-5 mb-2 text-right mr-4"><b>Jumlah SKS : 0</b></p>`
    // update ui form pilih matakuliah
    pilihMatakuliah.innerHTML = formInputMatakuliah
}
updateJumlahInputMatakuliah()


// hapus inputan matakuliah saat tombol hapus diklik
document.addEventListener('click', e => {
  const btnHapusInput = e.target.parentElement.classList.contains('hapus-input')
  if (btnHapusInput) {
    // jika user konfirmasi untuk hapus maka hapus inpuatan
    if (confirm('yakin hapus inputan ?')) {
      // hapus inputan yang dipilih
      const id = e.target.parentElement.getAttribute('data-id')
      document.getElementById(id).remove()

      // jika inputan kosong hilangkan tombol simpan
      const input = document.querySelectorAll('.input-container')
      if (input.length == 1) {
        document.querySelector('.tombol-daftar-ppi').classList.replace('d-block', 'd-none')
        // kosongkan form inputan
        document.querySelector('.pilih-matakuliah').innerHTML = ''
      }
    }    
  }
})

// saat memilih input
function maksimalSks() {
  let sks = 0
  document.addEventListener('change', e => {
    if (e.target.classList.contains('input-matakuliah')) {
      let sksMatakuliah = parseInt(e.target.selectedOptions[0].getAttribute('data-sks'))
      sks += sksMatakuliah
      console.log(sks)
    }    
  })
}
maksimalSks()
