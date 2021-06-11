const token = getToken()
const config = {
  headers: { Authorization: `Bearer ${token.jwt}`}
}
// get data user yang login JWT
axios.get('/api/fakultas/biaya', config)
  .then(function (response) {
    // handle success
     const data = response.data
     document.getElementById('biaya-ppi').value = data.biaya
  })
  .catch(function (error) {
    console.log(error)
    // redirect kehalaman login jika user belum diautorisasi
   //  redirectTo('/login')
  })
