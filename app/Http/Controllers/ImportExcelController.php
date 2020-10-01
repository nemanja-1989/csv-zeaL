<?php

namespace App\Http\Controllers;

use App\ImportUser;
use Illuminate\Http\Request;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{

    //Return vith view
    public function index() {

        $importUsers = ImportUser::orderBy("id", "DESC")->paginate(10);

        return view("imports.index", [
            "importUsers" => $importUsers
        ]);
    }

    public function import(Request $request) {

        $this->validate($request, [
            "import" => "required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt,xls,xlsx"
        ]);

        if($request->hasFile("import") && $request->file("import")->isValid()) {
            
            $file = $request->file("import");

            Excel::import(new ImportUsers, $file);
        }
        
        return redirect()->back()->with("success", "Users uploaded successfully!");
    }

}
