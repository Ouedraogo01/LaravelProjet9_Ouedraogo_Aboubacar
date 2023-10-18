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
                <h1>VUE DES TUTEURS</h1>
                <a href="/ajouterTuteur" class="btn btn-primary">Ajouter un tuteur</a>
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
                            <th>Nom et Prénom</th>
                            <th>Etudiants à la charge</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide = 1;
                        @endphp
                        @foreach ($tuteurs as $tuteur)
                            <tr>
                                <td>{{ $ide}}</td>
                                <td>{{ $tuteur->nom_prenom}}</td>
                                <td>
                                    @foreach ($tuteur->etudiants as $etudiant)
                                        {{ $etudiant->nom }} {{ $etudiant->prenom }} ({{ $etudiant->classe }})
                                        <br>
                                    @endforeach
                                </td> 
                                <td>
                                    <a href="" class="btn btn-info">Update</a>
                                    <a href="/delete-tuteur/{{ $tuteur->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php
                                $ide += 1;
                            @endphp
                        @endforeach
                    </tbody>
                </table>

                <br> <br />
                <a href="/etudiant" class="btn btn-danger">Revenir à la liste des étudiants</a>
            </div>
        </div>
    </div>

    <script src="bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
</body>

</html>