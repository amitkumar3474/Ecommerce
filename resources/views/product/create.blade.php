@extends('layouts.admin')
@section('section_data')
    <div class="country">
        <div class="addbatan">
            <h2>Products form</h2>
        </div>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table border cellspacing=0>
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
                    <th><label for="">Name*</label></th>
                    <td>
                        <input type="text" name = "name" placeholder = "name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Sku*</label></th>
                    <td>
                        <input type="text" name = "sku" placeholder = "sku" value="{{ old('sku') }}">
                        @error('sku')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>
    
                <tr>
                    <th><label for="">Price</label></th>
                    <td>
                        <input type="text" name = "price" placeholder = "price" value="{{ old('price') }}">
                        @error('price')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Special Price</label></th>
                    <td>
                        <input type="text" name = "special_price" placeholder = "special_price" value="{{ old('special_price') }}">
                        @error('special_price')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Special Price from</label></th>
                    <td>
                        <input type="date" name = "special_price_from" placeholder = "" value="{{ old('special_price_from') }}">
                        @error('special_price_from')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Special Price to</label></th>
                    <td>
                        <input type="date" name = "special_price_to" placeholder = "" value="{{ old('special_price_to') }}">
                        @error('special_price_to')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Category </th>
                    <td>
                        @foreach($category as $_category)
                        <div>
                            <input type="checkbox" name="category[]" id="{{ $_category->name }}" class="check" value="{{ $_category->id }}">
                            <label for="{{ $_category->name }}">{{ $_category->name }}</label>
                        </div>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th>Product Image</th>
                    <td>
                        <input type="file" name="product_image">
                        @error('product_image')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>
                
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
                    <th>Url Key</th>
                    <td>
                        <input type="text" name="url_key" id="" value="{{old('url_key')}}">
                        @error('url_key')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Qty</th>
                    <td>
                        <input type="number" name="qty" id="" value="{{old('qty')}}">
                        @error('qty')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th><label for="">Stock Status</label></th>
                    <td>
                        <select name="stock_status" id="">
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
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