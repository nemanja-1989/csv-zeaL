<?php

namespace App\Exports;

use App\ImportUser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportUsers implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // return ImportUser::get();
        
        return view('exports.importUsers', [
            'importUsers' => ImportUser::get()
        ]);
        
    }
}
