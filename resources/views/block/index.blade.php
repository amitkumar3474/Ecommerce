
@extends('layouts.admin')

@section('section_data')
    
            <div class="addbatan">
                <h2>Blocks</h2>
                <button><a href="{{ route('block.create') }}">+ Add New Block</a></button>
            </div>
            <hr>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Heading</th>
                    <th>Status</th>
                    <th>Identifier</th>
                    <th>Action</th>
                </tr>
                
                @foreach($blocks as $_block)
                    <tr>
                        <td>{{ $_block->id }}</td>
                        <td>{{ $_block->name }}</td>
                        <td>{{ $_block->heading }}</td>
                        <td>{{ $_block->status }}</td>
                        <td>{{ $_block->identifier }}</td>
                        <td>
                            <a href="{{ route('block.edit', $_block->id) }}">Edit</a>
                            <form action="{{ route('block.destroy', $_block->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="submit" id="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>    
            <div class="pages">
                {{$blocks->links()}}
            </div> 
@endsection