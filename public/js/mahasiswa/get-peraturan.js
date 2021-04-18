// get data user yang login JWT
axios.get('/api/ppi/peraturan')
  .then(function (response) {
    // handle success
    const daftar_peraturan = response.data.daftar_peraturan
    
    // console.log(daftar_peraturan)
    isiDaftarPeraturan(daftar_peraturan)
  })
  .catch(function (error) {
    console.log(error)
    // redirect kehalaman login jika user belum diautorisasi
    updateToken()
    window.location.href = '/login';
  })

function isiDaftarPeraturan(daftar_peraturan)
{
  const table_matakuliah = getSelector('.daftar-peraturan')
  let peraturan = ''

  // jika tidak ada matakuliah yang dikonfirmasi
  if (!daftar_peraturan) {
    return table_matakuliah.innerHTML = '<tr><td class="text-center" colspan="3">Belum ada matakuliah yang dikonfirmasi oleh prodi</td></tr>'
  }

  daftar_peraturan.forEach((peraturan_ppi, nomor) => {
    peraturan += `
    <div class="card mb-1">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link text-info" type="button" data-toggle="collapse" data-target="#collapseOne${peraturan_ppi.id_peraturan}"
              aria-expanded="true" aria-controls="collapseOne">
              <i class="tim-icons icon-minimal-down mr-1"></i>
              Peraturan ${++nomor}
            </button>
          </h2>
        </div>

        <div id="collapseOne${peraturan_ppi.id_peraturan}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body text-secondary text-justify mx-4">
            ${peraturan_ppi.peraturan}
          </div>
        </div>
      </div>`
  });

  // isi table matakuliah yang telah dikonfirmasi oleh prodi
  table_matakuliah.innerHTML = peraturan
}