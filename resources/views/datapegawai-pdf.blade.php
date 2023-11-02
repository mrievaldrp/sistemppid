<!DOCTYPE html>
<html>

<head>
   <style>
      #customers {
         font-family: Arial, Helvetica, sans-serif;
         border-collapse: collapse;
         width: 100%;
      }

      #customers td,
      #customers th {
         border: 1px solid #ddd;
         padding: 8px;
      }

      #customers tr:nth-child(even) {
         background-color: #f2f2f2;
      }

      #customers tr:hover {
         background-color: #6A9C89;
      }

      #customers th {
         padding-top: 12px;
         padding-bottom: 12px;
         text-align: left;
         background-color: #04AA6D;
         color: white;
      }
   </style>
</head>

<body>

   <center>
      <h1>Rekapan Pengajuan Data Per Triwulan</h1>
   </center>
   <table id="customers">
      <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Jenis Kelamain</th>
         <th>No Telepon</th>
      </tr>
      @php
      $no=1;
      @endphp
      @foreach ($data as $row)
      <tr>
         <td>{{ $no++ }}</td>
         <td>{{ $row->nama }}</td>
         <td>{{ $row->jeniskelamin }}</td>
         <td>0{{ $row->notelpon }}</td>
      </tr>
      @endforeach
   </table>

</body>

</html>