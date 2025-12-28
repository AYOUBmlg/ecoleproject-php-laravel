<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">

        <h2>LOGIN</h2>

@if(session('errorMessage'))
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>{{ session('errorMessage') }}</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    </button>
  </div>
@endif

@if($errors->any())
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    </button>
  </div>
@endif

        <br>
        <form method="post" action="{{ route('utulisateurs.login') }}">
            @csrf
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="password">Password:</label>
                    <div class="col-sm-6">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="{{ route('utulisateurs.create') }}">Sign Up</a>
                    </div>
            </div>
        </form>

    </div>

</body>
</html>
