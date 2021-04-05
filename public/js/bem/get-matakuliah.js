$(document).ready(function () {
  const token = getToken()
  let nomor = 0;
  $('#matkul-ppi').DataTable({
    "ajax": {
      'url': 'http://localhost:8080/api/ppi/matakuliah',
      'dataSrc': "daftar_matakuliah"
    },
    "columnDefs":
    [{
        "targets": [0, 2, 3],
        "className": "text-center"
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
          return `<td>${row.matakuliah}</td>`
        }
      },
      {
        "targets": 2,
        "render": function (data, type, row) {
          return `<td>${row.sks}</td>`
        }
      },
      {
        "targets": 3,
        "render": function (data, type, row) {
          return `<td class="text-center">
                    <button type="button" class="btn btn-warning btn-sm btn-ubah-matakuliah" data-id="${row.id_matakuliah}" data-matkul="${row.matakuliah}" data-sks="${row.sks}" id="exampleModalLabel">
                      Ubah
                    </button>
                  </td>`
        }
      },
    ]
  });
});