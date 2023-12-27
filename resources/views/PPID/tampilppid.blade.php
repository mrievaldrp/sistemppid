@extends('layout.admin')

@section('content')

<body>
   <br>
   <br>

   <div class="container">
      <div class="row justify-content-center">
         <h1 class="text-center mb-4 mt-5">Data Permintaan</h1>
      </div>
      <div class="row justify-content-center">
         <div class="col-8">
            <div class="card">
               <div class="card-body mb-4">
                  <form action="/updateppid/{{ $data->id }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <!-- Nama -->
                     <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Nama Pemohon</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="namaHelp" placeholder="Masukkan nama pemohon" value="{{ $data->nama }}">
                        @error('$nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!-- Nomor Permintaan -->
                     <div class=" mb-3">
                        <label for="exampleInputPhone" class="form-label"> Nomor Permintaan</label>
                        <input type="tel" name="np" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="Masukkan nomor permintaan" value="{{ $data->np }}">
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
                        <input type="text" name="alamat" class="form-control" id="exampleInputAlamat" aria-describedby="emailHelp" placeholder="Masukkan alamat" value="{{ $data->alamat }}">
                     </div>
                     <!-- EMAIL -->
                     <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email" value="{{ $data->email }}">
                     </div>
                     <!-- TELEPHONE -->
                     <div class=" mb-3">
                        <label for="exampleInputPhone" class="form-label">Telephone</label>
                        <input type="tel" name="tlp" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="Masukkan nomor telepon" value="{{ $data->tlp }}">
                        <!-- tambahkan placeholder untuk memberikan petunjuk kepada pengguna -->
                     </div>
                     <!-- OPD -->
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">OPD</label>
                        <input type="text" name="opd" class="form-control" id="exampleInputOPD" aria-describedby="opdHelp" placeholder="Masukkan OPD terkait" value="{{ $data->opd }}">
                     </div>
                     <!-- TanggalPermintaanInformasi -->
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Permintaan Informasi</label>
                        <input type="date" name="tgl_permintaan" class="form-control" id="exampleInputTanggal" aria-describedby="tanggalHelp" value="{{ $data->tgl_permintaan ? \Carbon\Carbon::parse($data->tgl_permintaan)->format('Y-m-d') : '' }}"">
                     </div>
                     <!-- RPI -->
                     <div class=" mb-3 ">
                        <label for=" exampleInputEmail1" class="form-label">Rincian Permintaan Informasi</label>
                        <textarea class="form-control" name="rpi" rows="3" value="{{ $data->rpi }}">{{ $data->rpi }}</textarea>
                     </div>
                     <!-- TPI -->
                     <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Tujuan Permintaan Informasi</label>
                        <textarea class="form-control" name="tpi" rows="3" value="{{ $data->tpi }}">{{ $data->tpi }}</textarea>
                     </div>

                     <!-- <div class=" mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                        <input type="file" name="foto" class="form-control"">
                     </div> -->
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