<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professeur Dashboard</title>
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
            <h1 class="text-center mb-4">Professeur cours</h1>
            
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="{{ route('cour.create') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-5">
                                <h3 class="card-title text-primary">Ajouter Cours</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('cour.index') }}" class="text-decoration-none">
                        <div class="card shadow text-center" style="cursor: pointer;">
                            <div class="card-body py-5">
                                <h3 class="card-title text-primary">Modification de Cours</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
