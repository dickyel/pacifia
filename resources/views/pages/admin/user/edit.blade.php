@extends('layouts.admin')


@section('title','User')

@section('content')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Edit User</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('user-admin.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="name">Nama User:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Email:</label>
                    <input type="text" class="form-control" id="name" name="email" value="{{ $item->email }}" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="is_active">Aktif/Engga:</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ $item->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $item->is_active == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label>Roles</label>
                    <select name="role_id" class="form-control">
                        <option value="{{ $item->role_id}}">{{ $item->role->name }}</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="info">Info Lainnya:</label>
                    <textarea class="form-control" id="additional_data" name="additional_data">{{ $item->additional_data }}</textarea>
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

@endsection