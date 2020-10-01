@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table table-hover table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email address</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                          <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role) 
                                    [ {{ $role->name }} ]
                                @endforeach
                            </td>
                            <td>
                                @can("edit-users")
                                    <a class="float-left" style="margin-right: 2px;" href="{{ route("admin.users.edit", $user->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                    </a>
                                @endcan
                                @can("delete-users")
                                    <form class="float-left" action="{{ route("admin.users.destroy", $user->id) }}" method="POST"> 
                                        @csrf 
                                        {{ method_field("DELETE") }}
                                        <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                                    </form> 
                                @endcan
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection