<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\{AdvanceCalculatorRecord, AdvanceCalculatorRecordData};

class AdvancedCalculator extends Component
{
    public $mainLoad;
    public $newLoad;
    public $size;
    public $profit;
    public $profitCount;
    public $loss;
    public $positionCount;
    public $positions;
    public $positionsRecalculate;
    public $editPositionKey;
    public $editPositionTP;
    public $editPositionPercentage;
    public $totalSL;
    public $name;


    public function render()
    {
        return view('livewire.advanced-calculator',['positions'=>$this->positions]);
    }
    public function mount()
    {
        $this->mainLoad = 100;
        $this->newLoad = 0;
        $this->size = 100;
        $this->profit = 15;
        $this->loss = 15;
        $this->positionCount = 10;
        $this->positions = collect([]);
        $this->positionsRecalculate = collect([]);
        $this->editPositionPercentage = null;
        $this->editPositionTP = null;
        $this->editPositionKey = null;
        $this->totalSL = 0;
        $this->profitCount = 0;
    }

    public function updated()
    {
        if($this->positions->count()){
            $this->reCalculate();
        }else{
            $this->calculate();
        }
    }

    public function resetComponentData()
    {
        $this->mount();
    }

    public function safeValues()
    {
        $this->profit = round($this->profit)*1;
        $this->loss = round($this->loss)*1;
        $this->mainLoad = round($this->mainLoad)*1;
        $this->size = $this->size*1;
        $this->profitCount = 0;
    }

    public function calculate()
    {
        $this->safeValues();
        $this->positions = collect([]);
        $sizeForCalculation = $this->size/100;
        $mainLoad = $this->mainLoad;
        $loadWithSize = $mainLoad*$sizeForCalculation;
        for ($i=0; $i < $this->positionCount; $i++) { 
            if($i>0){
                $loadWithSize = $this->newLoad*$sizeForCalculation;
            }
            $loadEffect = $loadWithSize*($this->profit/100);
            if($i>0){
                $this->newLoad = $this->newLoad + $loadEffect;
            }else{
                $this->newLoad = $mainLoad + $loadEffect;
            }
            $this->profitCount++;
            $this->positions->push(collect(
                [
                    'newMainLoad'=>$this->newLoad,
                    'tp'=>true,
                    'profit'=>$loadEffect,
                    'positionPersantage'=>$this->profit,
                    'diffInNumbers'=>$loadEffect
                ]
            ));
            //tp-sl burada işlemin tekrar hesaplanması için kar zarar olup olmadığını belirler. Başlangıç hesabı için hepsi tp kabul edilir
            //tp-sl 1 kar
            //tp-sl 0 zarar
        }
    }
    
    protected function reCalculate()
    {
        $this->safeValues();
        $sizeForCalculation = $this->size/100;
        $mainLoad = $this->mainLoad;
        $loadWithSize = $mainLoad*$sizeForCalculation;
        foreach ($this->positions as $key => $position) {
            if ($position['tp']) {
                $carpan = 1;
                $this->profitCount++;
                $position['positionPersantage'] = $this->profit;
            }else{
                $carpan = -1;
                $position['positionPersantage'] = $this->loss;
            }
            if($key == 0){
                $loadEffect = $loadWithSize*($position['positionPersantage']/100)*$carpan;
                $this->newLoad = $loadWithSize + $loadEffect;
            }else{
                $loadEffect = $this->newLoad*($position['positionPersantage']/100)*$carpan;
                $this->newLoad = $this->newLoad + $loadEffect;
            }
            $position['tp'] == false ? $this->totalSL = $this->totalSL + $loadEffect : $this->totalSL = $this->totalSL;
            $this->positionsRecalculate->push(collect(
                [
                    'newMainLoad'=>$this->newLoad,
                    'tp'=>$position['tp'],
                    'profit'=>$loadEffect,
                    'positionPersantage'=>$position['positionPersantage'],
                    'diffInNumbers'=>$loadEffect
                ]
            ));
        }
        $this->positions = collect([]);
        $this->positions = $this->positionsRecalculate;
        $this->positionsRecalculate = collect([]);
    }

    public function editPosition($positionKey)
    {
        if ($this->editPositionKey === null) {
            $this->editPositionKey = $positionKey;
            $this->editPositionTP = $this->positions[$positionKey]['tp'];
        }elseif($positionKey === $this->editPositionKey){
            $this->editPositionKey = null;
            $this->editPositionTP = null;
            $this->editPositionPercentage = null;
            if($this->loss === null){$this->loss=0;}
            $this->positions[$positionKey]['tp'] = !$this->positions[$positionKey]['tp'];
            if($this->positions[$positionKey]['tp']){
                $this->positions[$positionKey]['positionPersantage'] = $this->profit;
            }else{
                $this->positions[$positionKey]['positionPersantage'] = $this->loss;
            }
            $this->reCalculate();
        }else{
            $this->editPositionKey = $positionKey;
            $this->editPositionTP = $this->positions[$positionKey]['tp'];
        }
    }

    protected function clearData(){
        $this->editPositionKey = null;
        $this->editPositionTP = null;
        $this->editPositionPercentage = null;
        $this->totalSL = 0;
        $this->profitCount = 0;
    }

    public function saveCollection(){
        if($this->name == null || $this->name == ""){
            $this->name="No Name";
        }
        $maxOrder = AdvanceCalculatorRecord::get('order')->pluck('order')->max();
        if($maxOrder > 1){
            $order = $maxOrder+1;
        }else{
            $order = 1;
        }
        $newAdvCalRec = new AdvanceCalculatorRecord;
        $newAdvCalRec->name = $this->name;
        $newAdvCalRec->positionCount = $this->positionCount;
        $newAdvCalRec->margin = $this->size;
        $newAdvCalRec->result = "X" . number_format(($this->positions->sum('profit')+$this->mainLoad)/$this->mainLoad, 2, '.', ',');
        $newAdvCalRec->order = $order;
        $newAdvCalRec->save();
        
        foreach ($this->positions as $value) {
            $newAdvCalRecData = new AdvanceCalculatorRecordData();
            $newAdvCalRecData->position_id = $newAdvCalRec->id;
            $newAdvCalRecData->new_main_load = $value['newMainLoad'];
            $newAdvCalRecData->tp = $value['tp'];
            $newAdvCalRecData->profit = $value['profit']; //tp&sl numeric
            $newAdvCalRecData->diff_in_numbers = $value['diffInNumbers'];
            $newAdvCalRecData->position_persantage = $value['positionPersantage']; //tp&sl persentage 
            $newAdvCalRecData->save();
        }
        $this->dispatch('hideModal');
    }

}