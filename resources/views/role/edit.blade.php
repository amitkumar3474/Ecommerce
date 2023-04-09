@extends('layouts.admin')
@section('section_data')
    <div class="country">
        <div class="addbatan">
            <h2>Role edit form</h2>
        </div>
        <form action="{{ route('role.update', $role->id) }}" method="post">
            @method('PUT')
            @csrf
            <table  cellspacing=0>
                <tr>
                    <th><label for="">Name</label></th>
                    <td>
                        <input type="text" name="name" value="{{ $role->name }}">
                        <span class="text-danger">
                            @error('name')
                                {{$message}};
                            @enderror
                        </span>
                    </td>
                </tr>
                <tr>
                    <th><label for="">Permissions</label></th>
                    <td>
                        @foreach($permissions as $_permission)
                            <div>
                                <input type="checkbox" class="check" name="permissions[]" id="<?=$_permission->name?>" value="<?=$_permission->name?>"{{ ($role->hasPermissionTo($_permission->name))?'checked':'' }}>
                                <label for="<?=$_permission->name?>"><?=$_permission->name?></label>
                            </div>
                        @endforeach

                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button id="submit1" name="submit" value ="submit">Submit</button>
                        <!-- <button id="submit1" name="save-new" value ="submit">Save & new</button> -->
                    </th>
                </tr>
            </table>
        </form>
    </div>
@endsection