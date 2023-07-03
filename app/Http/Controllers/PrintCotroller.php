<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submit;
use Carbon\Carbon;
use PDF;

class PrintCotroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        if($request->print == 'receipt'){
            $submit = Submit::find($request->id);
            $today = Carbon::today(); 
            $pdf = PDF::loadView('export'.'.'.$request->print,compact('submit'),compact('today'));
            // 가로세로 설정
            $pdf->setPaper('A4','portrait'); 
            return $pdf->stream('영수증');
        }else if($request->print == 'certificate'){
            $submit = Submit::find($request->id);
            $today = Carbon::today(); 
            $pdf = PDF::loadView('export'.'.'.$request->print,compact('submit'),compact('today'));
            // 가로세로 설정
            $pdf->setPaper('A4','portrait');
            return $pdf->stream('이수증');
        }
        
    } 
}
