@extends('layout.admin')

@section('content')

<!-- Tambahkan pada bagian <head> HTML -->


<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <!-- Teks di tengah -->
               <h1 class="text-center mb-3">Report Registrasi Pelayanan Teman Disko</h1>
            </div>
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>

   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <!--@if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
               {{ $message }}
            </div>
            @endif-->
         </div>
      </div>
      <div class="row mb-2">
         <div class="col-md-12 mb-1">
            <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>
         </div>
      </div>

      <div class="row g-3 align-items-center mb-2 mt-1">
         <div class="col-auto mb-2">
            <form action="/pegawai" method="get">
               <input type="search" id="inputPassword5" name="search" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Klik untuk mencari">
            </form>
         </div>

         <!-- EXPORT START-->
         <div class="col-auto mb-2">
            <a href="/exportpdf" class="btn btn-danger">Export PDF</a>
         </div>

         <div class="col-auto mb-2">
            <a href="/exportexcel" class="btn btn-success">Export Excel</a>
         </div>

         <div class="col-auto mb-2">
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
         <!-- SCRIPT -->
         <script>
            $(document).ready(function() {
               $('#myTable').DataTable(); // Perhatikan perubahan pada selector
            });
         </script>
         <!-- END SCRIPT -->
         <div class="row">
            <div class="col-md-12 px-3">
               <div class="table-responsive">
                  <table id="myTable" class="table table-striped table-bordered table-hover">
                     <!-- Table header -->
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">No</th>
                           <th scope="col" class="text-center">Nama Instansi</th>
                           <th scope="col" class="text-center">Nomor Surat</th>
                           <th scope="col" class="text-center">Tanggal Surat</th>
                           <th scope="col" class="text-center">Tanggal Kegiatan</th>
                           <th scope="col" class="text-center">Perihal</th>
                           <th scope="col" class="text-center">Jenis Layanan</th>
                           <th scope="col" class="text-center">Action</th>
                        </tr>
                     </thead>
                     <!-- Table body -->
                     <tbody>
                        @php $no = 1; @endphp
                        @foreach ($data as $index => $row)
                        <tr>
                           <th scope="row">{{ $index + $data->firstItem() }}</th>
                           <td>{{ $row->nama }}</td>
                           <td>{{ $row->nomorsurat }}</td>
                           <td>{{ date('d F Y', strtotime($row->tanggalsurat)) }}</td>
                           <td>{{ date('d F Y', strtotime($row->tgl_kgt))}}</td>
                           <td>{{ $row->perihal }}</td>
                           <td>{{ $row->jenis_layanan }}</td>
                           <td>
                              <a href="/tampilkandata/{{ $row->id }}" class="btn btn-outline-info btn-sm">
                                 <i class="fas fa-edit"></i>
                              </a>
                              <a href="/viewtedik/{{ $row->id }}" class="btn btn-outline-warning btn-sm  mb-1 mt-1">
                                 <i class="fas fa-eye"></i>
                              </a>
                              <a href="#" class="btn btn-outline-danger btn-sm delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">
                                 <i class="fas fa-trash"></i>
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>

               {{ $data->links() }}
            </div>
         </div>


      </div>
   </div>

</div>
</div>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" rossorigin="anonymous" referrerpolicy="no-referrer"></script>
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


@endsection