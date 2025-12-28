<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Filieres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2>List of Filieres</h2>
    <a class="btn btn-primary" href="{{ route('filiere.create') }}">Add Filiere</a>

    <br>
    <br>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

@foreach($listefilieres as $filiere)
<tr>
    <td>{{$filiere->id}}</td>
    <td>{{$filiere->nom}}</td>
    <td>{{$filiere->description}}</td>
    <td>
    <a class='btn btn-success btn-sm' href="{{ route('filiere.edit', $filiere->id) }}">edit</a>
    <form method="post" action="{{ route('filiere.destroy', $filiere->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">delete</button>
    </form>
    </td>
</tr>
@endforeach
        </tbody>
        {{ $listefilieres->links() }}
    </table>
    </div>
</body>
</html>
