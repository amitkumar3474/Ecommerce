
@extends('layouts.admin')

@section('section_data')
    
            <div class="addbatan">
                <h2>Prmissions</h2>
                <button><a href="{{ route('permission.create') }}">+ Add New Permission</a></button>
            </div>
            <hr>
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table> 
            <tbody>

            </tbody>   

    <script type="text/javascript">
        $(function () {
            
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('permission.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
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