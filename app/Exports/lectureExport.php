<?php

namespace App\Exports;

use App\Models\Lecture;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class lectureExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $submitrow = 0;
        return lecture::select(
            'id',
            'name',
            'email',
            'title',
            'country',
            'created_at'
            )->get();
    }
    public function headings(): array
    {
        return [
            '번호',
            '이름',
            '이메일',
            '제목',
            '국가',
            '등록일'
        ];
    }

}
