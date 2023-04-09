@extends('layouts.admin')
@section('section_data')
    <div class="country">
        <div class="addbatan">
            <h2>Page form</h2>
        </div>
        <form action="{{ route('page.store') }}" method="post">
            @csrf
            <table border cellspacing=0>
                <tr>
                    <th><label for="">Name*</label></th>
                    <td>
                        <input type="text" name = "name" placeholder = "name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Status*</label></th>
                    <td>
                        <select name="status" id="">
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th><label for="">Heading</label></th>
                    <td>
                        <input type="text" name = "heading" placeholder = "heading" value="{{ old('heading') }}">
                        @error('heading')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10" value="{{old('description')}}"></textarea>
                        @error('description')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Url Key</th>
                    <td>
                        <input type="text" name="url_key" id="" value="{{old('url_key')}}">
                        @error('url_key')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
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

    <script>
        CKEDITOR.replace('description');
    </script>

@endsection