<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExampleUserInfoImport;
use Livewire\Attributes\{On,Renderless};


class Extensions extends Component
{
    use WithFileUploads;

    public $exampleExcelFile;
    public $oldExampleExcelFile;
    // public $sameFileCheck;

    public function mount()
    {
        // $this->sameFileCheck = false;
    }
    
 
    public function render()
    {
        // dd($this->sameFileCheck);
        return view('livewire.extensions');
    }
    
    public function exampleImportFileDownload()
    {
        return response()->download(public_path('/exampleFile/Example-Import-File.xlsx'), 'Example-Import-File.xlsx');
    }

    public function uploadexampleExcelFile()
    {
        // dd('here');
        $this->oldExampleExcelFile = $this->exampleExcelFile;
        $this->exampleExcelFile = null;
        // Excel::import(new ExampleUserInfoImport, $this->exampleExcelFile);
        $this->dispatch('hideModal'); 
    }

}
