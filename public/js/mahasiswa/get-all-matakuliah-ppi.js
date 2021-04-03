$(document).ready(function () {
   $('#matkul-ppi').DataTable({
      "pageLength": 50,
      "bLengthChange": false,
      "bFilter": false,
      "bInfo": false,
      "ajax": {
         'url': 'http://localhost:8080/api/ppi/matakuliah',
         'dataSrc':"daftar_matakuliah"
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
            return `
            <div class="${row.matakuliah.replace(/\s/g, "-")}">
               <button type="button" class="btn btn-info btn-sm matakuliah-terpilih" data-matakuliah="${row.matakuliah}" data-sks="${row.sks}">
                  programkan
               </button>
            </div> 
            `;            
         }
      }]

   });
});

// {/* <tr class="pilih-matakuliah">
//                 <!-- <td>1</td> -->
//                 <td>Java Lanjut</td>
//                 <td>2</td>
//                 <td class="text-center javascript">
//                   <button type="button" class="btn btn-info btn-sm matakuliah-terpilih" data-matakuliah="javascript"
//                     data-sks="2">programkan</button>
//                 </td>
//               </tr> */}