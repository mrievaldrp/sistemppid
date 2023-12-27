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
                     <form action="/tambahdata" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Nama Pemohon</label>
                           <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="namaHelp" placeholder="Masukkan nama pemohon">
                           @error('$nama')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- Nomor Permintaan -->
                        <div class=" mb-3">
                           <label for="exampleInputPhone" class="form-label">Nomor Permintaan</label>
                           <input type="tel" name="np" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="Masukkan nomor permintaan">
                           <!-- tambahkan placeholder untuk memberikan petunjuk kepada pengguna -->
                        </div>
                        <!-- KTP 
                        <div class="mb-3">
                           <label for="exampleInputKTP" class="form-label">Upload File KTP</label>
                           <input type="file" name="filektp" class="form-control" id="exampleInputKTP" aria-describedby="ktpHelp">
                        </div>-->
                        <!-- ALAMAT -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Alamat</label>
                           <input type="text" name="alamat" class="form-control" id="exampleInputAlamat" aria-describedby="emailHelp" placeholder="Masukkan alamat">
                        </div>
                        <!-- EMAIL -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Email</label>
                           <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email">
                        </div>
                        <!-- TELEPHONE -->
                        <div class=" mb-3">
                           <label for="exampleInputPhone" class="form-label">Telephone</label>
                           <input type="tel" name="tlp" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="Masukkan nomor telepon">
                           <!-- tambahkan placeholder untuk memberikan petunjuk kepada pengguna -->
                        </div>
                        <!-- OPD -->
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">OPD</label>
                           <input type="text" name="opd" class="form-control" id="exampleInputOPD" aria-describedby="opdHelp" placeholder="Masukkan OPD terkait">
                        </div>
                        <!-- TanggalPermintaanInformasi -->
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Tanggal Permintaan Informasi</label>
                           <input type="date" name="tgl_permintaan" class="form-control" id="exampleInputTanggal" aria-describedby="tanggalHelp">
                        </div>
                        <!-- RPI -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Rincian Permintaan Informasi</label>
                           <textarea class="form-control" name="rpi" rows="3"></textarea>
                        </div>
                        <!-- TPI -->
                        <div class="mb-3 ">
                           <label for="exampleInputEmail1" class="form-label">Tujuan Permintaan Informasi</label>
                           <textarea class="form-control" name="tpi" rows="3"></textarea>
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