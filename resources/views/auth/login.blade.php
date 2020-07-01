@extends('products.adminHeader')

@section('content')

<div class="container">


<div class="card col-12 col-lg-4 login-card mt-5 mr-auto hv-center" style=" margin-top:12px;   >
  <header class="card-header">
    <p class="card-header-title">
      Login
    </p>
  </header>
 
  <div class="card-content">
    <div class="content">
    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input id="email" name="email" class="input" type="email" placeholder="Email">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </p>
                        </div>


                        <div class="field">
                            <p class="control has-icons-left">
                                <input id="password" class="input" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="button is-primary">Login</button>

                    </form>
    </div>
  </div>



 
@endsection


