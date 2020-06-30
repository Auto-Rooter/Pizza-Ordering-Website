@extends('products.adminHeader')

@section('content')
<div class="container">


<div class="card col-12 col-lg-4 login-card mt-5 mr-auto hv-center" style=" margin-top:12px;   >
  <header class="card-header">
    <p class="card-header-title">
      Register
    </p>
  </header>
 
  <div class="card-content">
    <div class="content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="field">
                        <p class="control ">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <input id="name" name="name" class="input" type="name" placeholder="Full Name" required>
 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </p>
                        </div>



                        <div class="field">
                        <p class="control   ">
                           <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <input id="email" name="email" class="input" type="email" placeholder="Your Email" required>
   
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </p>
                        </div>



                        <div class="field">
                        <p class="control   ">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <input id="phone" name="phone" class="input" type="phone" placeholder="Your Phone Number" required>
   
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </p>
                        </div>


                        
                        <div class="field">
                        <p class="control   ">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <input id="address" name="address" class="input" type="address" placeholder="Your Address" required>
 
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </p>
                        </div>



                                                
                        <div class="field">
                        <p class="control   ">
                           <label for="address" class="col-md-4 col-form-label text-md-right">Password</label>
                            <input id="password" name="password" class="input" type="password" placeholder="Password" required>
   
 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </p>
                        </div>


                                                                        
                        <div class="field">
                        <p class="control   ">
                           <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm password</label>
                            <input id="password-confirm" name="password_confirmation" class="input" type="password" placeholder="Confirm Password" required>
   
 
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </p>
                        </div>

                        


                        <button type="submit" class="button is-primary">Register</button>

                    </form>
                </div>
            </div>
        </div>
@endsection
