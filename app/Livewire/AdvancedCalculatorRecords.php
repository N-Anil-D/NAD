<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{AdvanceCalculatorRecord, AdvanceCalculatorRecordData};

class AdvancedCalculatorRecords extends Component
{
    public $record;
    public $position;
    public $positionList;
    public $editPositionKey;

    public function render()
    {
        return view('livewire.advanced-calculator-records',['position'=>$this->position,'positionList'=>$this->positionList]);
    }

    public function mount()
    {
        $this->position = collect([]);
        $this->positionList = AdvanceCalculatorRecord::get();
    }

    public function setPositionData($id){
        $this->record = AdvanceCalculatorRecord::find($id);
        $this->position = AdvanceCalculatorRecordData::where('position_id',$id)->get();
    }

    public function edit($id,$proccess)
    {
        if ($proccess === "up"){
            $editData = AdvanceCalculatorRecord::find($id);
            $upperOrderData = AdvanceCalculatorRecord::where('order',($editData->order+1))->get()->first();
            if($upperOrderData){
                $upperOrderData->order = $upperOrderData->order--;
                $upperOrderData->save();
            }
        }elseif ($proccess === "down") {
            $editData = AdvanceCalculatorRecord::find($id);
            $upperOrderData = AdvanceCalculatorRecord::where('order',($editData->order-1))->get()->first();
            if ($upperOrderData) {
                $upperOrderData->order = $upperOrderData->order++;
                $upperOrderData->save();
            }
            $editData->order = $editData->order--;
            $editData->save();
        }elseif ($proccess === "delete") {
            $editData = AdvanceCalculatorRecord::find($id)->delete();
        }
    }

}