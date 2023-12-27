@extends('layout.admin')

@section('content')
<!--  
<div class="content-wrapper"> 
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Rekapan Data Instansi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v2</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>

   <div class="container">
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
               <input type="search" id="inputPassword5" name="search" class="form-control" aria-describedby="passwordHelpBlock">
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
</div>

</div>



   @endsection