// menampilkan pesan error pada form inputan
function showErrorMessage(input, message) {
  input.parentElement.setAttribute('data-error', message)
  input.parentElement.classList.add('error-message')
  input.classList.add('input')
}

// menghilangkan pesan error saat input ulang data di form
function removeErrorMessage() {
  document.querySelectorAll('.input-container.error-message[data-error] .input').forEach(inputElement => {
    inputElement.addEventListener('input', () => {
      inputElement.parentElement.classList.remove('error-message')
      inputElement.classList.remove('input')
    })
  })
}