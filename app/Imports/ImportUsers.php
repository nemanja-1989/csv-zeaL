<?php

namespace App\Imports;

use App\ImportUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ImportUsers implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new ImportUser([
            "first_name" => $row["first_name"],
            "last_name" => $row["last_name"],
            "gender" => $row["gender"],
            "date_of_birth" => $row["date_of_birth"]
        ]);
    }
}
