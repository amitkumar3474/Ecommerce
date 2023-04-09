@extends('layouts.admin')
@section('section_data')
    <div class="country">
        <div class="addbatan">
            <h2>Category form</h2>
        </div>
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
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
                    <th><label for="">Show in Menu</label></th>
                    <td>
                        <select name="show_in_menu" id="">
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th><label for="">Parent Id</label></th>
                    <td>
                        <select name="parent_id" id="">
                            <option value="0">Parent Category</option>
                        </select>
                    </td>
                </tr>

                <!-- <tr>
                    <th><label for="">Parent Id</label></th>
                    <td>
                        <input type="text" name = "parent_id" placeholder = "parent_id" value="{{ old('parent_id') }}">
                        @error('parent_id')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr> -->

                <tr>
                    <th>Short description</th>
                    <td>
                        <textarea type="text" name="short_description" id="" value="{{old('short_description')}}"></textarea>
                        @error('short_description')
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
                    <th>Thumbnail Image</th>
                    <td>
                        <input type="file" name="thumbnail_image" id="" value="{{old('thumbnail_image')}}">
                        @error('thumbnail_image')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Banner Image</th>
                    <td>
                        <input type="file" name="banner_image" id="" value="{{old('banner_image')}}">
                        @error('banner_image')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Is Featured</label></th>
                    <td>
                        <select name="is_featured" id="">
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th><label for="">Url Key</label></th>
                    <td>
                        <input type="text" name = "url_key" placeholder = "url_key" value="{{ old('url_key') }}">
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