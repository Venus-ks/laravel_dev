<?php

namespace App\Exports;

use App\Models\Submit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class submitExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $submitrow = 0;
        return Submit::select(
            'id',
            'level',
            'option',
            'price',
            'name',
            'sosok',
            'job',
            'email',
            'cellphone',
            'status',
            'created_at'
            )->get();
    }
    public function headings(): array
    {
        return [
            '번호',
            '등록구분',
            '급수',
            '등록비',
            '이름',
            '소속',
            '직위',
            '이메일',
            '휴대폰 번호',
            '입금상태',
            '등록일'
        ];
    }
}
