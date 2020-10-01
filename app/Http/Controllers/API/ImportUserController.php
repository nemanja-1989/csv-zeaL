<?php

namespace App\Http\Controllers\API;

use App\ImportUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ImportUserResource;
use App\Http\Resources\ImportUserCollection;
use Carbon\Carbon;

class ImportUserController extends Controller
{
    
    public function index()
    {
        $male = ImportUserCollection::collection(ImportUser::whereRaw("YEAR(CURRENT_DATE) - YEAR(date_of_birth) > 18")->where("gender", "M")->get());

        $female = ImportUserCollection::collection(ImportUser::whereRaw("YEAR(CURRENT_DATE) - YEAR(date_of_birth) > 18")->where("gender", "F")->get());

        return [
            "male" => $male,
            "female" => $female
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "first_name" => "required|min:3|max:20|string",
            "last_name" => "required|min:3|max:20|string",
            "gender" => "required|min:1|max:1",
            "date_of_birth" => "required|date"
        ]);

        $user = new ImportUser();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();

        return response([
            "import_user" => new ImportUserResource($user)
        ], 201);
    }

   
    public function show($id)
    {
        $user = ImportUser::whereId($id)->first();

        return new ImportUserResource($user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "first_name" => "required|min:3|max:20|string",
            "last_name" => "required|min:3|max:20|string",
            "gender" => "required|min:1|max:1",
            "date_of_birth" => "required|date"
        ]);

        $user = ImportUser::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();

        return response([
            "import_user" => new ImportUserResource($user)
        ], 205);
    }

   
    public function destroy($id)
    {
        $user = ImportUser::findOrFail($id);

        $user->delete();

        return response([
            null
        ], 204);
    }
}
