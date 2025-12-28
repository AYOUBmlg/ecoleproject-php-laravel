<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Cours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2>List of Cours</h2>
    <a class="btn btn-primary" href="{{ route('cour.create') }}">Add Cours</a>

    <br>
    <br>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Type</th>
            <th>Module</th>
            <th>Filiere</th>
            <th>Professeur</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

@foreach($listecours as $cour)
<tr>
    <td>{{$cour->id}}</td>
    <td>{{$cour->titre}}</td>
    <td>{{$cour->type}}</td>
    <td>{{$cour->module ? $cour->module->name : 'N/A'}}</td>
    <td>{{$cour->filiere ? $cour->filiere->nom : 'N/A'}}</td>
    <td>{{$cour->professeur ? $cour->professeur->name : 'N/A'}}</td>
    <td>
    <a class='btn btn-success btn-sm' href="{{ route('cour.edit', $cour->id) }}">edit</a>
    <form method="post" action="{{ route('cour.destroy', $cour->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">delete</button>
    </form>
    </td>
</tr>
@endforeach
        </tbody>
        {{ $listecours->links() }}
    </table>
    </div>
</body>
</html>
