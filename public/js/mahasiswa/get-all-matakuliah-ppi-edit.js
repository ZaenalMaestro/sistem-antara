$(document).ready(function () {
   // get data JWT user yang login 
   const login = JSON.parse(localStorage.getItem('login'))
   $('#matkul-ppi').DataTable({
      "pageLength": 50,
      "bLengthChange": false,
      "bFilter": false,
      "bInfo": false,
      "ajax": {
         'url': 'http://localhost:8080/api/mahasiswa/data/edit',
         'dataSrc': "matakuliah_mahasiswa",
         'headers': {
            'Authorization': `Bearer ${login.jwt}`
         }
      },
      "columns": [
         {"data": "matakuliah"},
         {"data": "sks"}
      ],
      "columnDefs": [{
         "targets": [2],
         "className": "text-center"
      },
      {
         "targets": 2,
         "width": "60px",
         "render": function (data, type, row) {
            if (row.status == 'belum_diprogramkan') {
               return `
                  <div class="${row.matakuliah.replace(/\s/g, "-")}">                  
                     <button type="button" class="btn btn-info btn-sm matakuliah-terpilih" data-matakuliah="${row.matakuliah}" data-sks="${row.sks}">
                        programkan
                     </button>
                  </div> 
                  `;  
            } else {
               return `
                  <div class="${row.matakuliah.replace(/\s/g, "-")}">    
                  </div> 
                  `;  
            }
         }
      }]

   });
});
