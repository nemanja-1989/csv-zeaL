@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Import Users API</div>

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

                    {{-- DISPLAY MALE USERS --}}
                    <div class="mt-5"> 
                        <button type="button" class="btn btn-warning btn-sm" id="get-male-users">Male users</button>
                        <div class="card-header">Male users</div>
                        <table class="table table-hover table-dark">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Date of Birth</th>
                              </tr>
                            </thead>
                            <tbody id="tbody-male">
                              
                            </tbody>
                          </table>
                    </div>

                    {{-- DISPLAY FEMALE USERS --}}
                    <div class="mt-5"> 
                        <button type="button" class="btn btn-warning btn-sm" id="get-female-users">Female users</button>
                        <div class="card-header">Female users</div>
                        <table class="table table-hover table-dark">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Date of Birth</th>
                              </tr>
                            </thead>
                            <tbody id="tbody-female">
                              
                            </tbody>
                          </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/apiAPP.js"></script>
@endsection