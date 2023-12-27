<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ppid;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Facade;

class PpidController extends Controller
{
    public function index(Request $request)
    {
        
        $data1 = $this->getData();

        // if ($request->ajax()) {
        //     return view('PPID/ppidpegawai', compact('data'));
        // }

        return view('PPID/ppidpegawai', compact('data1'));
    }

    public function getData(){
        $startDate = Carbon::now()->subMonths(12)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $request = request();
        $query = Ppid::whereBetween('tgl_permintaan', [$startDate, $endDate]);

        if ($request->has('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        $data1 = $query->get();
        if ($request->has('search')) {
            $data1 = Ppid::where('nama', 'LIKE', '%' . $request->search . '%')
                ->orWhere('opd', 'LIKE', '%' . $request->search . '%')
                ->paginate(5);
        } else {
            $data1 = Ppid::paginate(5);
        }
        return $data1;
    }

    public function tambahppid()
    {
        return view('PPID/tambahppid');
    }


    public function tambahdata(Request $request)
    {
        // Validasi dan sebagainya...

        $data1 = Ppid::create($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data1->foto = $request->file('foto')->getClientOriginalName();
            $data1->save();
        }

        // Menyimpan $data1 dalam session
        session(['data' => $data1]);

        return redirect()->route('ppidpegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function tampilppid($id)
    {
        $data = Ppid::find($id);
        //dd($data);
        return view('PPID/tampilppid', compact('data'));
    }

    public function updateppid(Request $request, $id)
    {
        $data1 = Ppid::find($id);
        $data1->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data1->foto = $request->file('foto')->getClientOriginalName();
            $data1->save();
        }
        return redirect()->route('ppidpegawai')->with('success', 'Data Berhasil Di Update');
    }

    public function viewppid(Request $request, $id)
    {
        $data1 = Ppid::find($id);

        return view('PPID/viewppid', compact('data'));
    }

















    public function printpdf()
    {
        // Ambil data dari model Ppid
        $data1 = Ppid::all();

        // Share data dengan view
        view()->share('data', $data1);

        // Buat PDF dengan menggunakan DomPDF
        $pdf = Pdf::loadView('PPID/ppidpegawai-pdf');

        // Atur orientasi dan ukuran halaman PDF menjadi landscape
        $pdf->setPaper('a4', 'landscape');

        // Tentukan font size untuk setiap kolom (sesuaikan sesuai kebutuhan)
        $fontSize = 14;

        // Tentukan padding untuk setiap kolom (sesuaikan sesuai kebutuhan)
        $padding = 5;

        // Loop melalui setiap kolom dan atur lebar kolom berdasarkan panjang teks terpanjang
        foreach ($data1->first()->getAttributes() as $column => $value) {
            $maxColumnWidth = max(strlen($column), ...$data1->pluck($column)->map('strlen'));
            $columnWidth = ($maxColumnWidth * $fontSize) + $padding;

            // Atur lebar kolom dalam satuan millimeter
            $pdf->getDomPDF()->getCanvas()->get_dompdf['10, 10, "Hello world!", null, 10'] = $columnWidth;
        }

        // Simpan atau keluarkan PDF ke browser
        return $pdf->download('REKAPAN_TRIWULAN_INSTANSI.pdf');
    }
}
