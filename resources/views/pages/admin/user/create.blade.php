@extends('layouts.admin')


@section('title','User')

@section('content')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah User</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('user-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama User:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Email:</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Role:</label>
                    <select name="role_id" class="form-control">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Aktif/Engga:</label>
                    <select name="is_active" class="form-control">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            
            
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="info">Info Lainnya:</label>
                    <textarea class="form-control" id="additional_data" name="additional_data"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah User</button>
    </form>
</div>


@endsection