@extends('layouts.admin')

@section('title', 'project-admin-create')

@section('content')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Project</h2>
    @if($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="competitionForm" action="{{ route('project-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="image">File Panduan:</label>
                        <input type="file" class="form-control" name="panduan[]">
                      
                    </div>
                </div>
         
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="Nama Title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title[]" required>
                  
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="">Deskripsi Project:</label>
                        <textarea class="form-control" id="desc" name="desc[]" required></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="Liris">Liris:</label>
                        <input type="date" class="form-control" id="liris" name="liris[]" required>
                  
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="">Link Demo:</label>
                        <input type="text" class="form-control" id="link_demo" name="link_demo[]" required>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="">Link Hubungi:</label>
                        <input type="text" class="form-control" id="link_hubungi" name="link_hubungi[]" >
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="">Additional Info:</label>
                        <input type="text" class="form-control" id="additional_info" name="additional_info[]" >                        
                    </div>
                </div>

               

            </div>
        </div>

        <button type="button" class="btn btn-success mb-4" onclick="addForm()">Tambah Form</button>
        <button type="button" class="btn btn-danger mb-4" onclick="removeForm()">Hapus Form</button>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Simpan</button>
        </div>
    </form>
</div>

@endsection

@push('after-script')
<script>

    function addForm() {
        var formContainer = document.querySelector('.form-section');
        var newForm = formContainer.firstElementChild.cloneNode(true);
        formContainer.appendChild(newForm);
        resetForm(newForm);
    }

    function removeForm() {
        var formContainer = document.querySelector('.form-section');
        var forms = formContainer.children;
        if (forms.length > 1) {
            formContainer.removeChild(forms[forms.length - 1]);
        }
    }

    function resetForm(form) {
        form.querySelector('.thumbnail-preview').src = '#';
        form.querySelector('.thumbnail-preview').style.display = 'none';
        form.querySelector('input[type=file]').value = '';
    }
</script>
@endpush
