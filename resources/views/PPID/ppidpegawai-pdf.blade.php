<!DOCTYPE html>
<html>

<head>
   <style>
      body {
         font-family: Arial, sans-serif;
      }

      table {
         width: 100%;
         max-width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }

      th,
      td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
         font-size: 10px;
         /* Sesuaikan ukuran font */
      }

      th {
         background-color: #192655;
         color: white;
      }

      tr:nth-child(even) {
         background-color: #f2f2f2;
      }

      tr:hover {
         background-color: #6A9C89;
      }

      @media print {
         @page {
            size: A4 landscape;
         }

         body {
            margin: 10mm 0mm 10mm 0mm;
            /* Atur margin agar sesuai dengan A4 */
         }
      }
   </style>
</head>

<body>

   <center>
      <h1>Rekapan Permohonan Data Per Triwulan</h1>
   </center>
   <table id="customers">
      <thead>
         <tr>
            <th scope="col">NO</th>
            <th>Nama Pemohon</th>
            <th>Nomor Permintaan</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>OPD</th>
            <th>Tanggal Permintaan Informasi</th>
            <th>Rincian Permintaan Informasi</th>
            <th>Tujuan Permintaan Informasi</th>
         </tr>
      </thead>
      <tbody>
         @php
         $no=1;
         @endphp
         @foreach ($data1 as $row)
         <tr>
            <td style="font-size: 12px;">{{ $no++ }}</td>
            <td style="font-size: 12px;">{{ $row->nama }}</td>
            <td style="font-size: 12px;">{{ $row->np }}</td>
            <td style="font-size: 10px;">{{ $row->email }}</td>
            <td style="font-size: 12px;">0{{ $row->tlp }}</td>
            <td style="font-size: 12px;">{{ $row->opd }}</td>
            <td style="font-size: 12px;">{{ date('d F Y', strtotime($row->tgl_permintaan)) }}</td>
            <td style="font-size: 12px;">{{ $row->rpi }}</td>
            <td style="font-size: 12px;">{{ $row->tpi }}</td>
         </tr>
         @endforeach
      </tbody>
   </table>
   <canvas id="columnChart" width="800" height="400"></canvas>
</body>

</html>