<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Modules</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2>List of Modules</h2>
    <a class="btn btn-primary" href="{{ route('module.create') }}">Add Module</a>

    <br>
    <br>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Filiere</th>
            <th>Professeur</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

@foreach($listemodules as $module)
<tr>
    <td>{{$module->id}}</td>
    <td>{{$module->nom}}</td>
    <td>{{$module->description}}</td>
    <td>{{$module->filiere ? $module->filiere->nom : 'N/A'}}</td>
    <td>{{$module->professeur ? $module->professeur->name : 'N/A'}}</td>
    <td>
    <a class='btn btn-success btn-sm' href="{{ route('module.edit', $module->id) }}">edit</a>
    <form method="post" action="{{ route('module.destroy', $module->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">delete</button>
    </form>
    </td>
</tr>
@endforeach
        </tbody>
        {{ $listemodules->links() }}
    </table>
    </div>
</body>
</html>
