axios.get('/api/bem/praktikum', config)
  .then(function (response) {
    // handle success
    const batas_praktikum = response.data.batas_praktikum[0]['batas_praktikum']
    getSelector('.input-praktikum-maksimal').value = batas_praktikum
  })
  .catch(function (error) {
    // handle error
    console.log(error);
    updateToken()
    return window.location.href = '/login'
  })