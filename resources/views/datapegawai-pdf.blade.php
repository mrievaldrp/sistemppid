<!DOCTYPE html>
<html>

<head>
   <style>
      body {
         font-family: Arial, sans-serif;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }

      th,
      td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
      }

      th {
         background-color: #04AA6D;
         color: white;
      }

      tr:nth-child(even) {
         background-color: #f2f2f2;
      }

      tr:hover {
         background-color: #6A9C89;
      }

      @media (max-width: 600px) {

         th,
         td {
            display: block;
            width: 100%;
            box-sizing: border-box;
         }

         th {
            text-align: center;
         }
      }
   </style>
</head>

<body>

   <center>
      <h1>Rekapan Permohonan Data Per Triwulan</h1>
   </center>
   <table id="customers">
      <tr>
         <th>No</th>
         <th>Nama Instansi</th>
         <th>Nomor Surat</th>
         <th>Tanggal Surat</th>
         <th>Tanggal Kegiatan</th>
         <th>Perihal</th>
         <th>Jenis Layanan</th>
         <!-- <th></th> -->
      </tr>
      @php
      $no=1;
      @endphp
      @foreach ($data as $row)
      <tr>
         <td>{{ $no++ }}</td>
         <td>{{ $row->nama }}</td>
         <td>{{ $row->nomorsurat }}</td>
         <td>{{ date('d F Y', strtotime($row->tanggalsurat)) }}</td>
         <td>{{ date('d F Y', strtotime($row->tgl_kgt)) }}</td>
         <td>{{ $row->perihal}}</td>
         <td>{{ $row->jenis_layanan}}</td>
      </tr>
      @endforeach
   </table>

</body>

</html>