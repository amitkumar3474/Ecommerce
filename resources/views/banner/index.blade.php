
@extends('layouts.admin')

@section('section_data')
    
            <div class="addbatan">
                <h2>Banners</h2>
                <button><a href="{{ route('banner.create') }}">+ Add New Banner</a></button>
            </div>
            <hr>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Banner Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                @foreach($banners as $_banner)
                    <tr>
                        <td>{{$_banner->id}}</td>
                        <td><img src="{{$_banner->getFirstMediaUrl('slider_image')}}" alt="" width="120px"></td>
                        <td>{{$_banner->status==1?'Enable':'Disable'}}</td>
                        <td>
                            <a href="{{ route('banner.edit', $_banner->id) }}">Edit</a>
                            <form action="{{ route('banner.destroy', $_banner->id) }}" method="post">
                                @csrf
                                @method('Delete')
                                <input type="submit" name="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>    
            <div class="pages">
                {{$banners->links()}}
            </div> 
@endsection