@extends('layout.admin')

@section('content')
<!-- <script>
    function updateClock() {
        // Buat objek untuk mengakses XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Tentukan URL ke skrip PHP yang memberikan waktu
        var url = '/path/to/get_time.php';// Gantilah dengan nama skrip PHP yang sesuai

        // Konfigurasi request AJAX
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update elemen HTML dengan waktu yang diterima dari server
                document.getElementById("currentTime").innerHTML = "<strong>Grafik </strong>" + xhr.responseText;
            }
        };

        // Buat request ke skrip PHP
        xhr.open('GET', url, true);
        xhr.send();
    }

    // Jalankan fungsi updateClock setiap detik (1000 milidetik)
    setInterval(updateClock, 1000);

    // Jalankan fungsi untuk pertama kali saat halaman dimuat
    updateClock();
</script> -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 elevation-2">
                        <span class="info-box-icon bg-info elevation-3"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Teman Disko</span>
                            <span class="info-box-number">
                                {{ $jumlahpegawai }}
                                <small>Permintaan </small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 elevation-2">
                        <span class="info-box-icon bg-danger elevation-3"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">PPID</span>
                            <span class="info-box-number">{{ $jumlahppid }}
                                <small>Permintaan</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 elevation-2">
                        <span class="info-box-icon bg-warning elevation-3"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Dokumentasi dan Materi </span>
                            <span class="info-box-number">{{ $jumlahppid }}
                                <small>Permintaan</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 elevation-2">
                        <span class="info-box-icon bg-success elevation-3"><i class="fas fa-users"></i> </span>

                        <div class=" info-box-content">
                            <span class="info-box-text">Total Permintaan</span>
                            <span class="info-box-number">{{$total = $jumlahpegawai + $jumlahppid}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- GRAFIK BULAN -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grafik Bulanan </h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Grafik </strong>

                                    </p>

                                    <!-- GRAFIK TMN DISKO -->
                                    <div class="chart">
                                        <!-- Column Chart Canvas -->
                                        <canvas id="columnChart" style="height: 180px;"></canvas>
                                    </div>

                                
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Ambil referensi ke elemen canvas
                                            var ctx = document.getElementById('columnChart').getContext('2d');

                                            // Inisialisasi data bulan dan data default
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            var defaultDataPegawai = [50, 65, 80, 92, '{{$jumlahpegawai}}', 60, 45, 70, 85, 78, 60, 55];
                                            var defaultDataPPID = [30, 45, 60, 75, 80, '{{$jumlahppid}}', 50, 55, 68, 72, 80, 90];

                                            // Data untuk grafik kolom (default)
                                            var data = {
                                                labels: months,
                                                datasets: [{
                                                    label: 'Jumlah Teman Disko',
                                                    data: defaultDataPegawai,
                                                    backgroundColor: '#994D1C'
                                                }, {
                                                    label: 'Jumlah PPID',
                                                    data: defaultDataPPID,
                                                    backgroundColor: '#B31312'
                                                }]
                                            };

                                            // Konfigurasi untuk grafik kolom
                                            var options = {
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                scales: {
                                                    x: {
                                                        stacked: true
                                                    },
                                                    y: {
                                                        stacked: true
                                                    }
                                                }
                                            };

                                            // Buat objek grafik kolom
                                            var myColumnChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: data,
                                                options: options
                                            });

                                            // Fungsi untuk mengupdate data berdasarkan bulan
                                            function updateChartByMonth($month) {
                                                // Menerapkan logika untuk mengambil data pada bulan yang dipilih
                                                // Untuk saat ini, anggaplah Anda memiliki fungsi getDataForMonth(bulan) yang mengembalikan data untuk bulan tertentu

                                                // Example:
                                                var newDataPegawai = getDataForMonth(selectedMonth).pegawai;
                                                var newDataPPID = getDataForMonth(selectedMonth).ppid;

                                                // Update chart data
                                                myColumnChart.data.datasets[0].data = newDataPegawai;
                                                myColumnChart.data.datasets[1].data = newDataPPID;

                                                // Update the chart
                                                myColumnChart.update();
                                            }

                                            // Panggil fungsi updateChartByMonth dengan bulan yang dipilih
                                            var selectedMonth = 'Januari'; // Ganti dengan bulan yang sesuai
                                            updateChartByMonth(selectedMonth);
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- GRAFIK TEMAN DISKON -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grafik Teman Disko</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Ambil referensi ke elemen canvas
                    var ctx = document.getElementById('lineChart').getContext('2d');

                    // Inisialisasi data bulan dan data default
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    // Asumsikan Anda memiliki variabel yang berisi data untuk setiap bulan, gantilah ini dengan data sebenarnya
                    var labels = {!!json_encode($label)!!};
                    var data = {!! json_encode($jml) !!};
                    // Data untuk grafik garis
                    var data = {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Teman Disko',
                             
                            fill: false, // Setel true jika ingin mengisi area di bawah garis
                            borderColor: '#994D1C',
                            borderWidth: 2,
                            data: data
                        }]
                    };

                    // Konfigurasi untuk grafik garis
                    var options = {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                stacked: true
                            },
                            y: {
                                stacked: true
                            }
                        }
                    };

                    // Buat objek grafik garis
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: data,
                        options: options
                    });
                });
            </script>

            <!-- GRAFIK PPID -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grafik PPID</h5>
                        </div>
                        <div class="card-body">
                        <canvas id="columnChartPPID"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Ganti ID pada script untuk grafik garis PPID
                    var ctxPPID = document.getElementById('columnChartPPID').getContext('2d');

                    // Inisialisasi data bulan dan data default
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    // Asumsikan Anda memiliki variabel yang berisi data untuk setiap bulan, gantilah ini dengan data sebenarnya
                    var labels1 = {!!json_encode($label1)!!};
                    var dataPPID = {!! json_encode($hsl) !!};
                    // Data untuk grafik garis
                    var dataPPID = {
    labels: labels1,
    datasets: [{
        label: 'Jumlah PPID',
        fill: false,
        borderColor: '#994D1C',
        borderWidth: 2,
        data: dataPPID
    }]
};

                    // Konfigurasi untuk grafik garis
                    var options = {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                stacked: true
                            },
                            y: {
                                stacked: true
                            }
                        }
                    };

                    // Buat objek grafik garis
                    var myLineChartPPID = new Chart(ctxPPID, {
                    type: 'bar',
                    data: dataPPID,
                    options: options
                    });
                    
                </script>



            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <!-- MAP & BOX PANE -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Laporan Rekap Bulanan</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body responsive flex">
                            <div class="d-md-flex">
                                <div class="p-1 flex-fill" style="overflow: hidden">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <table class="table table-striped-flex responsive">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">NO</th>
                                                        <th scope="col" class="text-center">Nama Instansi</th>
                                                        <th scope="col" class="text-center">Nomor Surat</th>
                                                        <th scope="col" class="text-center">Tanggal Surat</th>
                                                        <th scope="col" class="text-center">Tanggal Kegiatan</th>
                                                        <th scope="col" class="text-center">Perihal</th>
                                                        <th scope="col" class="text-center">Jenis Layanan</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
{{$data}}
                                                    @if(is_array($data) || is_object($data))
                                                    @foreach ($data as $index => $row)
                                                    <tr>
                                                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                                                        <td>{{ $row->nama }}</td>
                                                        <td>{{ $row->nomorsurat }}</td>
                                                        <td>{{ date('d F Y', strtotime($row->tanggalsurat)) }}</td>
                                                        <td>{{ date('d F Y', strtotime($row->tgl_kgt))}}</td>
                                                        <td>{{ $row->perihal }}</td>
                                                        <td>{{ $row->jenis_layanan }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan="8">Data tidak valid</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



@endsection