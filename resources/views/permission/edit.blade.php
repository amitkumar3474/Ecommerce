@extends('layouts.admin')
@section('section_data')
    <div class="country">
        <div class="addbatan">
            <h2>Prmissions edit form</h2>
        </div>
        <form action="{{ route('permission.update', $permission->id)}}" method="post">
            @csrf
            @method('PUT')
            <table  cellspacing=0>
                <tr>
                    <th><label for="">Name</label></th>
                    <td>
                        <input type="text" name="name" value="{{ $permission->name }}">
                        <span class="text-danger">
                            @error('name')
                                {{$message}};
                            @enderror
                        </span>
                    </td>
                </tr>

                <!-- <tr>
                    <th><label for="">Guard Name</label></th>
                    <td>
                        <input type="text" name="guard_name">
                        <span class="text-danger">
                            @error('guard_name')
                                {{$message}};
                            @enderror
                        </span>
                    </td>
                </tr>     -->
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