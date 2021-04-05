$(document).ready(function () {
  const token = getToken()
  let nomor = 0;
  $('#matkul-ppi').DataTable({
    "ajax": {
      'url': 'http://localhost:8080/api/bem/peraturan',
      'dataSrc': "peraturan_ppi",
      'headers': {
        'Authorization': `Bearer ${token.jwt}`
      }
    },
    "columnDefs":
    [{
        "targets": [0, 2],
      },
      {
        "targets": 0,
        "render": function (data, type, row) {
          return `${++nomor}`
        }
      },
      {
        "targets": 1,
        "render": function (data, type, row) {          
          return `<td>
                    <div class="row">
                      <div class="col-md-8">
                        ${row.peraturan}
                      </div>
                    </div>
                  </td>`
        }
      },
      {
        "targets": 2,
        "render": function (data, type, row) {
          return `<div class="text-center" data-id="${row.id_peraturan}" data-peraturan="${row.peraturan}">
                    <button class="btn btn-info btn-sm form-ubah" id="exampleModalLabel">Ubah</button>
                    <button class="btn btn-warning btn-sm mt-1 btn-hapus">Hapus</button>
                  </div>`
        }
      },
    ]
  });
});