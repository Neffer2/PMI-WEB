<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BaseExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function edit($id){
        return view('admin.edit', ['ejecucion_id' => $id]);
    }

    public function exportExcel() {                
        return Excel::download(new BaseExport("HOLA"), "base.xlsx");  
    }
}
