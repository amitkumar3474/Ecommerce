@extends('layouts.admin')
@section('section_data')
<section class="vh-100" style="background-color: #eee;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">User edit Form</p>

                                    <form class="mx-1 mx-md-4" action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      @method('PUT')
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="name" value="{{ $user->name }}"/>
                                                    @error('name')
                                                        <span class="text-danger">
                                                            {{$message}};
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                <input type="email" id="form3Example3c" class="form-control" name="email" value="{{ $user->email }}"/>                                               
                                                @error('email')
                                                    <span class="text-danger">
                                                        {{$message}};
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <input type="password" id="form3Example4c" class="form-control" name="password"/>                         
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4cd">Roles</label>
                                                @foreach($roles as $_role)
                                                <div>
                                                    <input type="checkbox" id="<?=$_role->name?>" class="f" name="roles[]" value="<?=$_role->name?>" {{ ($user->hasRole($_role->name))?'checked':''}}/>
                                                    <label class="form-label" for="<?=$_role->name?>"><?=$_role->name?></label>
                                                </div>    
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Profile Image</label>
                                                <input type="file" id="form3Example4cd" class="form-control" name="profile_image"/>
                                                @error('profile_image')
                                                    <span class="text-danger">
                                                        {{$message}};
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>
                                        
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="" class="btn btn-primary btn-lg">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection