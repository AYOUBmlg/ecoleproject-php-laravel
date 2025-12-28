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

<div class="container my-5">
    <h2>List of users from database</h2>
    <a class="btn btn-primary" href="{{ route('utulisateurs.create') }}">Signup</a>

    <br>
    <br>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Filiere</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

@foreach($listeutulisateurs as $utulisateur)
<tr>
    <td>{{$utulisateur->id}}</td>
    <td>{{$utulisateur->name}}</td>
    <td>{{$utulisateur->email}}</td>
    <td>{{$utulisateur->role}}</td>
    <td>{{$utulisateur->filiere ? $utulisateur->filiere->nom : 'N/A'}}</td>
    <td>
    <a class='btn btn-success btn-sm' href="{{ route('utulisateurs.edit', $utulisateur->id) }}">edit</a>
    <form method="post" action="{{ route('utulisateurs.destroy', $utulisateur->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">delete</button>
@csrf


</td>
</tr>
@endforeach
        </tbody>
        {{ $listeutulisateurs->links() }}
    </table>
    </div>
</body>
</html>
