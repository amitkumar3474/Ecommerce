@extends('layouts.admin')
@section('section_data')
    <div class="country">
        <div class="addbatan">
            <h2>Banner form</h2>
        </div>
        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table border cellspacing=0>
                <tr>
                    <th><label for="">Name</label></th>
                    <td>
                        <input type="text" name = "name" placeholder = "name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Banner Image</th>
                    <td>
                        <input type="file" name="slider_image">
                        @error('slider_image')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Status</label></th>
                    <td>
                        <select name="status" id="">
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>
                    </td>
                </tr>

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

    <script>
        CKEDITOR.replace('description');
    </script>

@endsection