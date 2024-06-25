<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceCalculatorRecord extends Model
{
    use HasFactory;
    

    public function getPositionData()
    {
        return $this->hasMany(AdvanceCalculatorRecordData::class,'position_id','id');
    }
}
