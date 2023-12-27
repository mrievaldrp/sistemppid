@extends('layout.admin')

@section('content')

<body>
   <br>
   <br>

   <div class="container">
      <div class="row justify-content-center">
         <h1 class="text-center mb-4 mt-5">Edit Data Pegawai</h1>
      </div>
      <div class="row justify-content-center">
         <div class="col-8">
            <div class="card">
               <div class="card-body">
                  <form action="/updatedata/{{ $data->id }}" method="post" enctype="multipart/form-data">
                     @csrf

                     <!-- Nama -->
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                     </div>

                     <!-- Nomor Surat -->
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nomor Surat</label>
                        <input type="text" name="nomorsurat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nomorsurat }}">
                     </div>

                     <!-- Tanggal Surat -->
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Surat</label>
                        <input type="date" name="tanggalsurat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->tanggalsurat ? \Carbon\Carbon::parse($data->tanggalsurat)->format('Y-m-d') : '' }}">
                     </div>

                     <!-- Tanggal Kegiatan -->
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Kegiatan</label>
                        <input type="date" name="tgl_kgt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->tgl_kgt ? \Carbon\Carbon::parse($data->tgl_kgt)->format('Y-m-d') : '' }}">
                     </div>

                     <!-- Perihal -->
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Perihal</label>
                        <textarea class="form-control" name="perihal" rows="3" id=" exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->perihal }}">{{ $data->perihal }} </textarea>
                     </div>
                     
                     <!-- Jenis Pelayanan -->
                     <div class="mb-3 ">
                        <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                        <select class="form-select" id="jenis_layanan" name="jenis_layanan">
                           <option value="peliputan">Peliputan/Dokumentasi Kegiatan</option>
                           <option value="diseminasi">Diseminasi/Penyebarluasan Informasi</option>
                        </select>
                     </div>

                     <button type=" submit" class="btn btn-success">Update</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>







   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

@endsection