@extends('layouts.admin')
@section('admin_content')

<div class="hold-transition login-page">
  <div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{route('admin.login')}}">
        <img src="{{url('public/files/login/index.png')}}" style="height:100px; width:100px;">
      </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><strong>Bangabandhu Sheikh Mujib Chair</strong></p>
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          @if (session('error'))
            <strong style="color:red;" >{{ session('error') }}</strong>
          @endif
          @error('email')
              <strong>{{ $message }}</strong>
          @enderror

        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          @if (session('error'))
            <strong style="color:red;" >{{ session('error') }}</strong>
          @endif
          @error('password')
            <strong style="color:red;">{{ $message }}</strong>
          @enderror
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
          @if (Route::has('password.request'))
            <p class="mb-1 ml-2">
              <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>
          @endif
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
      
      <!-- <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Sign Up</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</div>

@endsection