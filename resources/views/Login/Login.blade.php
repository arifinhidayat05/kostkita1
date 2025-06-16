<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login/Signup Form</title>
  <link rel="stylesheet" href="{{ asset('login_asset/style.css') }}" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container">

    {{-- Login Form --}}
    <div class="form-box login">
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <h1>Login</h1>

        <div class="input-box">
          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
          <i class="bx bxs-envelope"></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required />
          <i class="bx bxs-lock-alt"></i>
        </div>
        <div class="forgot-link">
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn">Login</button>
        <p>or login with social platforms</p>
        <div class="social-icons">
          <a href="{{ route('auth.google.redirect') }}"><i class="bx bxl-google"></i></a>
        </div>
      </form>
    </div>

    {{-- Register Form --}}
    <div class="form-box register">
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <h1>Registration</h1>

        @if ($errors->any() && request()->isMethod('post'))
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div class="input-box">
          <input type="text" name="nama" placeholder="Username" value="{{ old('nama') }}" required />
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
          <i class="bx bxs-envelope"></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required />
          <i class="bx bxs-lock-alt"></i>
        </div>
        <div class="input-box">
          <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
          <i class="bx bxs-lock-alt"></i>
        </div>
        <button type="submit" class="btn">Register</button>
        <p>or Register with social platforms</p>
        <div class="social-icons">
          <a href="{{ route('auth.google.redirect') }}"><i class="bx bxl-google"></i></a>
        </div>
      </form>
    </div>

    {{-- Toggle Panel --}}
    <div class="toggle-box">
      <div class="toggle-panel toggle-left">
        <h1>Hello, Welcome!</h1>
        <p>Don't have an account?</p>
        <button class="btn register-btn">Register</button>
      </div>

      <div class="toggle-panel toggle-right">
        <h1>Welcome Back!</h1>
        <p>Already have an account?</p>
        <button class="btn login-btn">Login</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('login_asset/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if($massage = Session::get('failed'))
  <script>
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "{{ $massage }}",
    });
  </script>

  @endif
</body>

</html>