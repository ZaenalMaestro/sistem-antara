function toggleForm() {
  var container = document.querySelector('.container')
  container.classList.toggle('active')
}

document.addEventListener('click', e => {
  e.preventDefault();
  if (e.target.classList.contains('link-pindah-form')) {
    const container = document.querySelector('.container')
    container.classList.toggle('active')
  }
})

// mengatur hanya nomor yg bisa dimasukkan
const stambuk = document.querySelector('.stambuk')
const stambukRegistrasi = document.querySelector('.stambuk-registrasi')
stambuk.addEventListener('keypress', onlyNumber)
stambukRegistrasi.addEventListener('keypress', onlyNumber)

function onlyNumber(e) {
  var input = String.fromCharCode(e.which)
  if (!(/[0-9]/.test(input))) e.preventDefault()
}

