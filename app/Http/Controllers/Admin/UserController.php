<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function __construct() {
        return $this->middleware(["auth"]);
    }
    
    public function index()
    {   
        $users = User::paginate(10);

        return view("admin.users.index", [
            "users" => $users
        ]);
    }

    public function edit($id)
    {

        $user = User::whereId($id)->first();

        if(Gate::denies("edit-users")) {
            return redirect()->route("admin.users.index")->with("warning", "$user->name is not allowed to edit users!");
        }

        $roles = Role::get();

        return view("admin.users.edit", [
            "user" => $user,
            "roles" => $roles
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            "name" => "sometimes|min:3|max:20|string",
            "email" => "sometimes|regex:/^[a-zA-Z0-9\_\.\-]+\@[a-zA-Z\.\_\-]+\.[a-z]{2,4}$/"
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        $user->roles()->sync($request->roles);

        return redirect()->route("admin.users.index")->with("success", "$user->name successfully updated!");
    }

    public function destroy($id)
    {
        $user = User::whereId($id)->first();

        if(Gate::denies("delete-users")) {
            return redirect()->route("admin.users.index")->with("warning", "$user->name not allowed to delete users!");
        }

        $user->delete();

        return redirect()->route("admin.users.index")->with("danger", "$user->name successfully deleted!");
    }
}
