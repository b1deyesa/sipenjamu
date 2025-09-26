<?php

namespace App\Http\Controllers\Dashboard\Monev;

use App\Models\Upps;
use App\Models\MonevTable;
use Illuminate\Http\Request;
use App\Exports\MonevTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\MonevTemplateImport;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index(Upps $upps)
    {
        $monevs = MonevTable::all();

        return view('dashboard.monev.index', compact('upps', 'monevs'));
    }
    
    public function show(Upps $upps, $slug)
    {
        $monev = MonevTable::where('slug', $slug)->first();
        
        return view('dashboard.monev.show', compact('upps', 'monev'));
    }
    
    public function export(Upps $upps, $slug)
    {
        $table = MonevTable::where('slug', $slug)->firstOrFail();
        
        $fileName = $table->slug . '-template.xlsx';

        return Excel::download(new MonevTemplateExport($table->id), $fileName);
    }
    
    public function import(Request $request, Upps $upps, $slug)
    {
        $table = MonevTable::where('slug', $slug)->firstOrFail();
    
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
    
        Excel::import(new MonevTemplateImport($table, $upps), $request->file('file'));
    
        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }
}
