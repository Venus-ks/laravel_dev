<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\submitExport;
use App\Exports\lectureExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcel extends Controller
{
   public function submitExcel()
   {
        return Excel::download(new submitExport, config('cm.submit')['title'].'.xlsx');
   }
   public function lectureExcel()
   {
        return Excel::download(new lectureExport, config('cm.lecture')['title'].'.xlsx');
   }
}
