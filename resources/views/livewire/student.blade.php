<div class="country">

@if($action=='list')
@if(Session::has('success'))
    <div class="success-message">{{ Session::get('success')}}</div>
@endif 
    <div class="addbatan">
        <h2>Students</h2>
        <button wire:click="create">+ Add New Page</button>
    </div>
            <hr>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Fess</th>
                    <th>Phone number</th>
                    <th>Class</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                
                @foreach($data as $_data)
                    <tr>
                        <td>{{ $_data->id }}</td>
                        <td>{{ $_data->name }}</td>
                        <td>{{ $_data->father_name }}</td>
                        <td>{{ $_data->fess }}</td>
                        <td>{{ $_data->phone_number }}</td>
                        <td>{{ $_data->class }}</td>
                        <td><img width="50px" src="{{ asset('storage/'.$_data->st_image)}}" alt=""></td>
                        <td>
                            <button wire:click="edit({{$_data->id}})">Edit</button>
                            <button wire:click="delete({{$_data->id}})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table> 
            
            @endif
            @if($action == 'creates')
        <div class="addbatan">
            <h2>{{($dataid)?'Student Edit Form':'Students form'}}</h2>
        </div>
        <form action="" wire:submit.prevent="store({{$dataid}})">
            <table border cellspacing=0>
                <tr>
                    <th><label for="">Name</label></th>
                    <td>
                        <input type="text" wire:model="name" placeholder = "name" value="">
                        @error('name')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Father Name</th>
                    <td>
                        <input type="text" wire:model="father_name">
                        @error('father_name')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Fess</th>
                    <td>
                        <input type="text" wire:model="fess">
                        @error('fess')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Phone Number</th>
                    <td>
                        <input type="text" wire:model="phone_number">
                        @error('phone_number')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Class</th>
                    <td>
                        <input type="text" wire:model="class">
                        @error('class')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <th>Image</th>
                    <td>
                        <input type="file" wire:model="st_image">
                        @error('st_image')
                            <span class="text-danger"> {{$message}}</span>
                        @enderror
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
        @endif

    </div>
