<?php

namespace App\Http\Controllers\Dashboard\Monev;

use App\Models\Upps;
use App\Models\MonevTable;
use Illuminate\Http\Request;
use App\Exports\MonevTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\MonevTemplateImport;
use App\Models\Periode;
use App\Models\ProgramStudi;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index(Upps $upps, ProgramStudi $programStudi, Periode $periode)
    {
        $monevs = MonevTable::all();

        return view('dashboard.monev.index', compact('upps', 'programStudi', 'periode', 'monevs'));
    }
    
    public function show(Upps $upps, ProgramStudi $programStudi, Periode $periode, $slug)
    {
        $monev = MonevTable::where('slug', $slug)->first();
        
        return view('dashboard.monev.show', compact('upps', 'programStudi', 'periode', 'monev'));
    }
    
    public function export(Upps $upps, ProgramStudi $programStudi, Periode $periode, $slug)
    {
        $table = MonevTable::where('slug', $slug)->firstOrFail();
        
        $fileName = $table->slug . '-template.xlsx';

        return Excel::download(new MonevTemplateExport($table->id), $fileName);
    }
    
    public function import(Request $request, Upps $upps, ProgramStudi $programStudi, Periode $periode, $slug)
    {
        $table = MonevTable::where('slug', $slug)->firstOrFail();
    
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
    
        Excel::import(new MonevTemplateImport($table, $programStudi, $periode), $request->file('file'));
    
        return redirect()->route('dashboard.monev.show', compact('upps', 'programStudi', 'periode', 'slug'))->with('success', 'Data berhasil diimport!');
    }
}
