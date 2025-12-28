<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
        }
        .center-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="center-container">
        <div class="container">
            <h1 class="text-center mb-5">Admin Dashboard</h1>
            
            <div class="row justify-content-center g-4">
                <!-- Utilisateurs -->
                <div class="col-md-3">
                    <a href="{{ route('utulisateurs.create') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Ajouter Utilisateur</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('utulisateurs.index') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Gestion Utilisateurs</h5>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Cours -->
                <div class="col-md-3">
                    <a href="{{ route('cour.create') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Ajouter Cours</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('cour.index') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Gestion Cours</h5>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Modules -->
                <div class="col-md-3">
                    <a href="{{ route('module.create') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Ajouter Module</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('module.index') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Gestion Modules</h5>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Filières -->
                <div class="col-md-3">
                    <a href="{{ route('filiere.create') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Ajouter Filière</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('filiere.index') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-4">
                                <h5 class="card-title text-primary">Gestion Filières</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
