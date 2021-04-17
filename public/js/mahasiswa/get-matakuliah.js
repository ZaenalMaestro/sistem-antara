$(document).ready(function () {
  let nomor = 0;
  $('#matkul-ppi').DataTable({
    "ajax": {
      'url': 'http://localhost:8080/api/ppi/matakuliah',
      'dataSrc': "daftar_matakuliah"
    },
    "columnDefs":
    [{
        "targets": [0, 2],
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
      }
    ]
  });
});