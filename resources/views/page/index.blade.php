
@extends('layouts.admin')

@section('section_data')
    
            <div class="addbatan">
                <h2>Pages</h2>
                <button><a href="{{ route('page.create') }}">+ Add New Page</a></button>
            </div>
            <hr>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Heading</th>
                    <th>Url Key</th>
                    <th>Action</th>
                </tr>
                
                @foreach($pages as $_page)
                    <tr>
                        <td>{{ $_page->id }}</td>
                        <td>{{ $_page->name }}</td>
                        <td>{{ $_page->status }}</td>
                        <td>{{ $_page->heading }}</td>
                        <td>{{ $_page->url_key }}</td>
                        <td>
                            <a href="{{ route('page.edit', $_page->id) }}">Edit</a>
                            <form action="{{ route('page.destroy', $_page->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="submit" id="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>    
            <div class="pages">
                {{$pages->links()}}
            </div> 
@endsection