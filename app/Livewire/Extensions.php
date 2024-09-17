<?php

namespace App\Livewire;

use Livewire\{Component,WithFileUploads};
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExampleUserInfoImport;
use App\Exports\ExampleUserExport;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Extensions extends Component
{
    use WithFileUploads;
    use LivewireAlert;


    public $exampleExcelFile;

    public function mount()
    {
        // $this->sameFileCheck = false;
    }
 
    public function render()
    {
        // $this->alert('success', 'Success is approaching!');
        return view('livewire.extensions');
    }
    
    public function exampleImportFileDownload()
    {
        return response()->download(public_path('/exampleFile/Example-Import-File.xlsx'), 'Example-Import-File.xlsx');
    }

    public function importExampleExcelFile()
    {
        Validator::validate((array('exampleExcelFile'=>$this->exampleExcelFile)), [
            'exampleExcelFile' => [ 'required','mimes:xlsx,xls']
        ]);
            
        Excel::import(new ExampleUserInfoImport, $this->exampleExcelFile);
        $this->dispatch('hideModal');
    }

    public function exportExampleExcelFile()
    {
        return Excel::download(new ExampleUserExport, 'ExampleExcelFile.xlsx');
    }

    public function runSweetAlert($type)
    {
        $this->alert($type, 'Basic Alert');
    }

}
