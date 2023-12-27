@extends('layout.admin')

@section('content')
<br>

<body>
   <div class="container mt-5">
      <h1 class="text-center mb-5">Input Data Laporan</h1>

      <div class="container mb-5">
         <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-body">
                     <form action="/insertdata" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Nama/Instansi</label>
                           <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                           @error('$nama')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <!-- Nomor Surat -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Nomor Surat</label>
                           <input type="text" name="nomorsurat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <!-- Tanggal Surat -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Tanggal Surat</label>
                           <input type="date" name="tanggalsurat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <!-- Tanggal Kegiatan -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Tanggal Kegiatan</label>
                           <input type="date" name="tgl_kgt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <!-- Nomor Surat 
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Jumlah Permintaan</label>
                           <input type="text" name="jumlahminta" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div> -->

                        <!-- Perihal -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Perihal</label>
                           <textarea class="form-control" name="perihal" rows="3"></textarea>
                        </div>
                        <!-- Jenis Pelayanan -->
                        <div class="mb-3 ">
                           <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                           <select class="form-select" id="jenis_layanan" name="jenis_layanan">
                              <option value="Peliputan">Peliputan/Dokumentasi Kegiatan</option>
                              <option value="Diseminasi">Diseminasi/Penyebarluasan Informasi</option>
                           </select>
                        </div>

                        <!-- Masukkan Foto ç
                      //  <div class=" mb-3">
                        //         <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                                 <input type="file" name="foto" class="form-control">
                        </div> -->

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap JavaScript Dependencies -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
@endsection