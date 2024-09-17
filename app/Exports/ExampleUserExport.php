<?php

namespace App\Exports;

use App\Models\ExampleUserInfo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ExampleUserExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExampleUserInfo::all();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Age',
            'Gender',
        ];
    }

}
