<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <title>DATA PEGAWAI</title>
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="text-center mb-4 mt-2">Rekapan Data Instansi</h1>
         </div>
         <div class="col-md-12">
            <!--@if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
               {{ $message }}
            </div>
            @endif-->
         </div>
      </div>
      <div class="row mb-2">
         <div class="col-md-12">
            <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>
         </div>
      </div>

      <div class="row g-3 align-items-center mb-2 mt-1">
         <div class="col-auto">
            <form action="/pegawai" method="get">
               <input type="search" id="inputPassword5" name="search" class="form-control" aria-describedby="passwordHelpBlock">
            </form>
         </div>

         <!-- EXPORT START-->
         <div class="col-auto mb-3">
            <a href="/exportpdf" class="btn btn-danger">Export PDF</a>
         </div>

         <div class="col-auto mb-3">
            <a href="/exportexcel" class="btn btn-success">Export Excel</a>
         </div>

         <div class="col-auto mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
               Import File
            </button>
         </div>
         <!-- EXPORT END-->
         <!-- IMPORT START-->

         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/importexcel" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="modal-body">
                        <div class="form-group">
                           <input type="file" name="file" required>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Berubah Pikiran</button>
                        <button type="submit" class="btn btn-primary">Simpan GA BOS?</button>
                     </div>
               </div>
               </form>
            </div>
         </div>


         <!-- IMPORT END-->

         <div class="row">
            <div class="col-md-12">
               <table class="table table-dark table-striped">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $no = 1; @endphp
                     @foreach ($data as $index => $row)
                     <tr>
                        <th scope="row">{{ $index + $data-> firstItem() }}</th>
                        <td>{{ $row->nama }}</td>
                        <td>
                           <img src=" {{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width: 50px; ">
                        </td>
                        <td>{{ $row->jeniskelamin }}</td>
                        <td>0{{ $row->notelpon }}</td>
                        <td>{{ $row->created_at->diffForHumans() }}</td>
                        <td>
                           <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                           <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"">Delete</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{ $data->links() }}
         </div>
      </div>
   </div>
   <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                              <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
                              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                              <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" rossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
   $('.delete').click(function() {
      var pegawaiid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
            title: "Perhatian!",
            text: "Kamu akan menghilangkan data ini dari dunia " + nama + " dengan ID " + pegawaiid,
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               // Alamatkan ke halaman penghapusan setelah penghapusan berhasil
               window.location = "/delete/" + pegawaiid + "";
            } else {
               swal("Data Berhasil Di Selamatkan GENG");
            }
         });
   })
</script>
@if(Session::has('success'))
<script>
   toastr.success("{{ Session::get('success') }}");
</script>
@endif

</html>