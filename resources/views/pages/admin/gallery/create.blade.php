@extends('layouts.admin')

@section('title', 'gallery-admin-create')

@push('after-style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Gallery</h2>
    @if($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="competitionForm" action="{{ route('gallery-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="image">Pilih Image:</label>
                        <input type="file" class="form-control" name="image_project[]" onchange="previewImage(this)">
                        <img class="thumbnail-preview mt-2" style="display:none; max-width: 100%;" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="kategori">Pilih Project:</label>
                        <select name="project_id[]" class="form-control">
                            @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach
                        </select>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).on('change', 'select[name="project_id[]"]', function() {
        $(this).select2();
    });


    function addForm() {
        var formContainer = document.querySelector('.form-section');
        var newForm = formContainer.firstElementChild.cloneNode(true);
        formContainer.appendChild(newForm);
        resetForm(newForm);

        // Reinitialize Select2 for the newly added form
        $(newForm).find('select[name="project_id[]"]').select2();
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

    function previewImage(input) {
        var preview = input.parentElement.querySelector('.thumbnail-preview');
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush



