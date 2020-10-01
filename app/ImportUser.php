<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportUser extends Model
{
    protected $fillable = [
        "first_name",
        "last_name",
        "gender",
        "date_of_birth"
    ];
}
