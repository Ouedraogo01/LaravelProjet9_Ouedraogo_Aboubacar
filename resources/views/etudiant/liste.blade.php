<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css">
</head>

<body>



    <div class="container text-center">
        <div class="row">
            <div class="col s12">
                <h1>VUE DES ETUDIANTS</h1>
                <a href="/ajouter" class="btn btn-primary">Ajouter un étudiant</a>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Classe</th>
                            <th>Photo</th>
                            <th>Tuteur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide = 1;
                        @endphp
                        @foreach ($etudiants as $etudiant)
                        <tr>
                            <td>{{ $ide}}</td>
                            <td>{{ $etudiant->nom}}</td>
                            <td>{{ $etudiant->prenom}}</td>
                            <td>{{ $etudiant->classe}}</td>
                            <td>
                                <img src="{{ asset('storage/' . $etudiant->photo) }}" alt="Photo de l'étudiant" width="50" style="border-radius: 50%;">
                            </td>
                            <td>{{ $etudiant->tuteur->nom_prenom }}</td>
                            
                            <td>
                                <a href="/update-etudiant/{{ $etudiant->id }}" class="btn btn-info">Update</a>
                                <a href="/delete-etudiant/{{ $etudiant->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $ide += 1;
                        @endphp
                        @endforeach
                    </tbody>
                </table>

                <br> <br />
                <a href="/tuteur" class="btn btn-danger">Voir la liste des tuteurs</a>
            </div>
        </div>
    </div>

    <script src="bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
</body>

</html>