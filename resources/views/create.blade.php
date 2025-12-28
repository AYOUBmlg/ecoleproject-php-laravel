<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 ">

        <h2>SIGN UP</h2>

        <br>
        <form method="post" action="{{ route('utulisateurs.store') }}">
            @csrf
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="name">Name:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="password">Password:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="role">Role:</label>
                    <div class="col-sm-6">
                        <select class="form-select" id="role" name="role" required>
                            <option value="">-- select role --</option>
                            <option value="admin">Admin</option>
                            <option value="professeur">Professeur</option>
                            <option value="etudiant">Etudiant</option>
                        </select>
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="filiere_id">Filiere:</label>
                    <div class="col-sm-6">
                        <select class="form-select" id="filiere_id" name="filiere_id">
                            <option value="">-- select Filiere --</option>
                            @isset($filieres)
                                @foreach($filieres as $filiere)
                                    <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
            </div>

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Signup</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="{{ route('utulisateurs.showlogin') }}">Login</a>
                    </div>
            </div>
        </form>

    </div>

</body>
</html>
