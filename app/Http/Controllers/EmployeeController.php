<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\returnSelf;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getData1();


        return view('datapegawai', compact('data'));
    }
    public function getData1(){

        $request = request();
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')
                ->orWhere('jenis_layanan', 'LIKE', '%' . $request->search . '%')
                ->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }

        return $data;
    }



    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        // $this->validate($request,[
        // 'name' => 'required|min:7|max:255',
        // 'nomorsurat' => 'required',

        $data = Employee::create($request->all());
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName();
        //     $data->save();
        
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Employee::find($id);
        //dd($data);
        return view('tampilkandata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Employee::find($id);
        if ($data) {
            $data->delete();

            return redirect()->route('pegawai')->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->route('pegawai')->with('error', 'Data tidak ditemukan');
        }
    }

    public function exportpdf()
    {
        $data = Employee::all();

        // Share data dengan view
        view()->share('data', $data);

        // Buat PDF dengan menggunakan DomPDF
        $pdf = FacadePDF::loadView('datapegawai-pdf');

        // Atur orientasi dan ukuran halaman PDF menjadi landscape
        $pdf->setPaper('a4', 'landscape');

        // Simpan atau keluarkan PDF ke browser
        return $pdf->download('REKAPAN_TRIWULAN_INSTANSI.pdf');
    }

    public function exportexcel()
    {
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namafile);
        Excel::import(new EmployeeImport, \public_path('/EmployeeData/' . $namafile));

        return \redirect()->back();
    }

    
}
