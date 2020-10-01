@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Excel Users</div>

                <div class="card-body">
                <div class="m-5">
                    <form action="{{ url("/import/import-users") }}" method="POST" enctype="multipart/form-data"> 
                        @csrf 

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-group">
                                    <label for="importUser">Upload Users</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="import">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="m-5">
                        @if($errors->count() > 0)
                            <ul> 
                                @foreach($errors->all() as $error)
                                    <li class="alert alert-danger" role="alert">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="mb-2">
                    <a href="{{ route("export.importUsers") }}"> 
                        <button type="button" class="btn btn-success btn-sm">Export Users</button>
                    </a>
                </div>
                    <div class="m-10">
                        <table class="table table-hover table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Date of birth</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($importUsers as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->date_of_birth }}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $importUsers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection