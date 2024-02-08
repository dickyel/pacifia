@extends('layouts.admin')

@section('title', 'project-admin-edit')

@section('content')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Edit Project</h2>
    @if($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('project-admin.update', $item->id ) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="panduan">File Panduan (PDF only):</label>
                        <input type="file" class="form-control" name="panduan" accept=".pdf">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="panduan">File Panduan (PDF only):</label>
                        <a href="{{ asset('storage/' . $item->panduan) }}" target="_blank">Buka/Unduh Panduan</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="desc">Deskripsi Project:</label>
                        <textarea class="form-control" id="desc" name="desc" required>{{ $item->desc }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="liris">Liris:</label>
                        <input type="date" class="form-control" id="liris" name="liris" value="{{ $item->liris }}" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="link_demo">Link Demo:</label>
                        <input type="text" class="form-control" id="link_demo" name="link_demo" value="{{ $item->link_demo }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="link_hubungi">Link Hubungi:</label>
                        <input type="text" class="form-control" id="link_hubungi" name="link_hubungi" value="{{ $item->link_hubungi }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="additional_info">Additional Info:</label>
                        <input type="text" class="form-control" id="additional_info" name="additional_info" value="{{ $item->additional_info }}">
                    </div>
                </div>

            </div>
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Simpan</button>
        </div>
    </form>
</div>

@endsection
