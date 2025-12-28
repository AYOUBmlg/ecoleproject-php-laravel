<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours Disponibles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Cours Disponibles</h1>
        
        <div class="row">
            @forelse($cours as $cour)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ $cour->titre }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $cour->description }}</p>
                        <p class="text-muted">
                            <strong>Module:</strong> {{ $cour->module->nom ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Aucun cours disponible pour le moment.
                </div>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('etudiant.dashboard') }}" class="btn btn-secondary">Retour au Dashboard</a>
        </div>
    </div>
</body>
</html>
