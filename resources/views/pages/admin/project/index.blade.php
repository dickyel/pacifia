@extends('layouts.admin')


@section('title','project-admin')

@section('content')

 <!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Project</h2>
    <div class="row">

        <div class="mb-3">
            <a href="{{ route('project-admin.create') }}" class="btn btn-primary">Tambah Project</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead class="thead-dark">
                    <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Desc</th>
                    <th>link_demo</th>
                    <th>file panduan</th>
                    <th>Link Hubungi</th>
                    <th>Liris</th>
                    <th>Additional Info</th>
                    
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
       
    </div>
</div>
@endsection

@push('after-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            dom: 'Bfrtip', // Add the 'B' button to the dom option
            buttons: [
                'excelHtml5', // Add the Excel button
            ],
            columns: [
                { 
                  data: 'DT_RowIndex', 
                  name: 'DT_RowIndex', 
                  orderable: false, 
                  searchable: false,
                  width: '5%',
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
                },
                { data: 'title', name: 'title' },
                { data: 'desc', name: 'desc' },
                { data: 'link_demo', name: 'link_demo' },
                { data: 'panduan', name: 'panduan',
                    render: function (data, type, full, meta) {
                        return '<a href="' + data + '" download>Download Panduan</a>';
                    }
                },

                { data: 'link_hubungi', name: 'link_hubungi' },
                { data: 'liris', name: 'liris' },
                { data: 'additional_info', name: 'additional_info' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
