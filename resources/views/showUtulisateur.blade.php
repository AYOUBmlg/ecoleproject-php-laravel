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

        <h2>UPDATE</h2>

@if(!empty($errorMessage))
  <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>{{ $errorMessage }}</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    </button>
  </div>
@endif

        <br>
        <form method="post"  action="{{ route('utulisateurs.update', $selectedUtulisateur->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="name">Name:</label>
                    <div class="col-sm-6">
                        <input value="{{ $selectedUtulisateur->name }}" class="form-control" type="text" id="name" name="name">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input value="{{ $selectedUtulisateur->email }}" class="form-control" type="email" id="email" name="email">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="role">Role:</label>
                    <div class="col-sm-6">
                        <select class="form-select" id="role" name="role" required>
                            <option value="">-- select role --</option>
                            <option value="admin" {{ $selectedUtulisateur->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="professeur" {{ $selectedUtulisateur->role == 'professeur' ? 'selected' : '' }}>Professeur</option>
                            <option value="etudiant" {{ $selectedUtulisateur->role == 'etudiant' ? 'selected' : '' }}>Etudiant</option>
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
                                    <option value="{{ $filiere->id }}" {{ $selectedUtulisateur->filiere_id == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
            </div>

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="{{ route('utulisateur.index') }}">Cancel</a>
                    </div>
            </div>
        </form>

    </div>

</body>
</html>