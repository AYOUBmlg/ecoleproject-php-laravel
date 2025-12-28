<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">

        <h2>ADD MODULE</h2>

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
        <form method="post" action="{{ route('module.store') }}">
            @csrf
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="nom">Nom:</label>
                    <div class="col-sm-6">
                        <input class="form-control @error('nom') is-invalid @enderror" type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="description">Description:</label>
                    <div class="col-sm-6">
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="filiere_id">Filiere:</label>
                    <div class="col-sm-6">
                        <select class="form-select @error('filiere_id') is-invalid @enderror" id="filiere_id" name="filiere_id" required>
                            <option value="">-- select filiere --</option>
                            @foreach($filieres as $filiere)
                                <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                            @endforeach
                        </select>
                        @error('filiere_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="professeur_id">Professeur:</label>
                    <div class="col-sm-6">
                        <select class="form-select @error('professeur_id') is-invalid @enderror" id="professeur_id" name="professeur_id" required>
                            <option value="">-- select professeur --</option>
                            @foreach($professeurs as $professeur)
                                <option value="{{ $professeur->id }}" {{ old('professeur_id') == $professeur->id ? 'selected' : '' }}>{{ $professeur->name }}</option>
                            @endforeach
                        </select>
                        @error('professeur_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Add</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="{{ route('module.index') }}">Cancel</a>
                    </div>
            </div>
        </form>

    </div>

</body>
</html>
