
@extends('layouts.admin')

@section('section_data')
    
    <div class="addbatan">
        <h2>Categories</h2>
        <button><a href="{{ route('category.create') }}">+ Add New Category</a></button>
    </div>
    <hr>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>show in Menu</th>
                <th>Parent Id</th>
                <th>Thumbnail Image</th>
                <th>Banner Image</th>
                <th>Url Key</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>    
    <script type="text/javascript">
        $(function () {
            
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('category.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {data: 'show_in_menu', name: 'show_in_menu'},
                    {data: 'parent_id', name: 'parent_id'},
                    {data: 'thumbnail_image', name: 'thumbnail_image'},
                    {data: 'banner_image', name: 'banner_image'},
                    {data: 'url_key', name: 'url_key'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
            
        });
    </script>
@endsection