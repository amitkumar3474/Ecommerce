@extends('layouts.admin')

@section('section_data')
    
    <div class="addbatan">
        <h2>Products</h2>
        <button><a href="{{ route('product.create')}}">+ Add New Product</a></button>
    </div>
    <hr>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Product Image</th>
                <th>category</th>
                <th>action</th>
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
                ajax: "{{ route('product.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'product_image', name: 'product_image'},
                    {data: 'categories', name: 'categories.name'},
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