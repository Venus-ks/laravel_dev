<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Lecture;

class FileController extends Controller
{
    //
    public function upload(Request $request)
    {

        $file = $request->file('file');
        
        $fileName = $file->getfileName().'.'.$file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();

        $extension = [
            'HWP',
            'DOC',
            'DOCX',
            'XLS',
            'XLSX',
            'PPT',
            'PPTX',
            'PDF',
            'JPG',
            'JPEG',
            'PNG',
            'GIF',
            'BMP',
            'TIFF',
            'TXT',
            'hwp',
            'doc',
            'docx',
            'xls',
            'xlsx',
            'ppt',
            'pptx',
            'pdf',
            'jpg',
            'jpeg',
            'png',
            'gif',
            'bmp',
            'tiff',
            'txt',
        ];

        if(!in_array($ext,$extension)){
            return response()->json([
                'Message'   => '파일 확장자가 맞지 않습니다.',
            ],404);
        };

        if($file){
            $file->storeAs('tmp',$fileName);
            return response()->json([
                'Original'  => $originalName,
                'Tmpname'   => $fileName,
                'Ext'       => $ext
            ],200);
        }else{
            return response()->error();
        }
    }
    public function download(Request $request, $original, $filename)
    {
        if(Storage::disk('lecture')->exists($filename)){
            return Storage::disk('lecture')->download($filename,$original);
        }else{
            return Storage::disk('tmp')->download($filename,$original);
        }
    }

}
