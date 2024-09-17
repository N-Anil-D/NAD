<?php

namespace App\Imports;

use App\Models\ExampleUserInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class ExampleUserInfoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct() {
        
        DB::table('example_user_infos')->truncate();
        
    }

    
    public function model(array $row)
    {
        return new ExampleUserInfo([
            'name'   => $row['name'],
            'age'    => $row['age'], 
            'gender' => $row['gender'], 
         ]);
    }
}
