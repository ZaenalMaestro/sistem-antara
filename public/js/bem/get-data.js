$(document).ready(function () {
  const token = getToken()
  $('#matkul-ppi').DataTable({
    "ajax": {
      'url': 'http://localhost:8080/api/bem/mahasiswa',
      'dataSrc': "mahasiswa_ppi",
      'headers': {
        'Authorization': `Bearer ${token.jwt}`
      }
    },
    "columns":
    [
      {"data": "stambuk"},
      {"data": "nama"}
    ],
    "columnDefs":
    [{
        "targets": [2, 3],
        "className": "text-center"
      },
      {
        "targets": 2,
        "render": function (data, type, row) {
          if (row.status_ppi == 'ditolak') {
            return `<td>
                    <span class="badge badge-sm" style="width:100px; background:#d9534f">
                      ${row.status_ppi}
                    </span>
                  </td>`
          }
          return `<td>
                    <span class="badge badge-${row.status_ppi === 'diterima' ? 'success' : 'warning'} badge-sm" style="width: 100px">
                      ${row.status_ppi}
                    </span>
                  </td>`
        }
        },
        {
          "targets": 3,
          "render": function (data, type, row) {
            return `<form action="">
                      <td>
                        <button type="button" class="btn btn-info btn-sm btn-detail" data-stambuk="${row.stambuk}">Lihat Detail</button>
                      </td>
                    </form>`
          }
        }
    ]
  });
});

// getDetail
document.addEventListener('click', lihatdetail)

// menampilkan halaman detail mahasiswa
function lihatdetail(e) {
  if (e.target.classList.contains('btn-detail')) {
    stambuk = e.target.getAttribute('data-stambuk')
    // simpan stambuk kedalam local storage
    setStambuk(stambuk)
    window.location.href = '/bem/detail'
  }
}
