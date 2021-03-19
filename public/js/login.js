// animasi pindah form
document.addEventListener('click', e => {
  e.preventDefault();
  if (e.target.classList.contains('link-pindah-form')) {
    const container = document.querySelector('.container')
    container.classList.toggle('active')
  }
})

// mengatur hanya nomor yg bisa dimasukkan di form stambuk
document.querySelectorAll('.validasi-stambuk').forEach(stb => {
  stb.addEventListener('keypress', event => {
    const input = String.fromCharCode(event.which)
    if (!(/[0-9]/.test(input))) event.preventDefault()
  })
})


// menjalankan fungsi remove error message
removeErrorMessage()



// validasi input ketika tombol login diklik
document.getElementById('tombol-login').addEventListener('click', () => {
  const stambuk = document.getElementById('stambuk-login')
  const password = document.getElementById('password-login')
  
  // validasi stambuk login
  if (stambuk.value === '') showErrorMessage(stambuk, 'Stambuk tidak boleh kosong !')    
  else if (stambuk.value !== '13020160068') showErrorMessage(stambuk, 'Stambuk tidak valid !')    
  
  // validasi password login
  if (password.value === '') showErrorMessage(password, 'Password tidak boleh kosong !')
  else if (password.value !== '1234qwerty') showErrorMessage(password, 'Password tidak valid !')

  // menghapus pesan error saat inputan diperbaharui
  removeErrorMessage()  
})

// validasi input ketika tombol login diklik
document.getElementById('tombol-registrasi').addEventListener('click', () => {
  const stambuk = document.getElementById('stambuk-login')
  const password = document.getElementById('password-login')
  
  // validasi stambuk login
  if (stambuk.value === '') showErrorMessage(stambuk, 'Stambuk tidak boleh kosong !')    
  else if (stambuk.value !== '13020160068') showErrorMessage(stambuk, 'Stambuk tidak valid !')    
  
  // validasi password login
  if (password.value === '') showErrorMessage(password, 'Password tidak boleh kosong !')
  else if (password.value !== '1234qwerty') showErrorMessage(password, 'Password tidak valid !')

  // menghapus pesan error saat inputan diperbaharui
  removeErrorMessage()  
})






