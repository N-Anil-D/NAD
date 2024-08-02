<?php

namespace App\Imports;

use App\Models\ExampleUserInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExampleUserInfoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd('dksjagdas');
        return new ExampleUserInfo([
            'name'   => $row['name'],
            'age'    => $row['age'], 
            'gender' => $row['gender'], 
         ]);
    }
}
