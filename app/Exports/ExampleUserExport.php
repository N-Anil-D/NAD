<?php

namespace App\Exports;

use App\Models\ExampleUserInfo;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExampleUserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExampleUserInfo::all();
    }
}
