<!doctype html> <html lang="en"> <head> <meta charset="utf-8"> <meta name="viewport" content="width=device-width,
    initial-scale=1">
<title>CRUD IN LARAVEL 10</title>
<link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>



    <div class="container">
        <div class="row">
            <h1>MODIFIER UN ETUDIANT</h1>
            <hr>

            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>

            <form action="/update/traitement" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf

                <input type="text" name="id" style="display: none;" value="{{ $etudiants->id }}">
             
                <div style="display: grid; grid-template-columns: 1fr 1fr;">
                    <div class="separartin m-2">
                        <div class="form-group">
                            <label for="Nom">Nom</label>
                            <input type="text" class="form-control" id="Nom" name="nom" value="{{ $etudiants->nom }}">
                        </div>

                        <div class="form-group">
                            <label for="Prenom">Prénom</label>
                            <input type="text" class="form-control" id="Prenom" name="prenom" value="{{ $etudiants->prenom }}">
                        </div>

                        <div class="form-group">
                            <label for="Classe">Classe</label>
                            <input type="text" class="form-control" id="Classe" name="classe" value="{{ $etudiants->classe }}">
                        </div>
                    </div>

                    <div class="m-2">
                        <div class="form-group mb-5 ml-5">
                            <label for="Tuteur">Sélectionnez votre  Tuteur</label>
                            <select class="form-select" aria-label="Default select example" name="tuteur_id">
                                @foreach ($tuteurs as $tuteur)
                                    <option value="{{ $tuteur->id }}" {{ $etudiants->tuteur_id == $tuteur->id ? 'selected' : '' }}>
                                        {{ $tuteur->nom_prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="Photo_actuelle">Votre photo de profile actuelle</label>
                            <img src="{{ asset('storage/' . $etudiants->photo) }}" alt="Photo acuelle">
                        </div>

                        <div class="form-group mt-2">
                            <label for="Photo">Télécharger un nouveau profile si vous le voulez</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">MODIFIER UN ETUDIANT</button>

                <br> <br />
                <a href="/etudiant" class="btn btn-danger"> Revenir à la liste des étudiants</a>
            </form>

            {{-- <form action="/update/traitement" method="POST" class="form-group">
                @csrf

                <input type="text" name="id" style="display: none;" value="{{ $etudiants->id }}">
             
                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="Nom" name="nom" value="{{ $etudiants->nom }}"></label>
                </div>

                <div class="form-group">
                    <label for="Prenom">Prénom</label>
                    <input type="text" class="form-control" id="Prenom" name="prenom" value="{{ $etudiants->prenom }}"></label>
                </div>

                <div class="form-group">
                    <label for="Classe">Classe</label>
                    <input type="text" class="form-control" id="Classe" name="classe" value="{{ $etudiants->classe }}"></label>
                </div>

                <div class="form-group mt-2">
                    <label for="Photo">Télécharger votre photo de profile</label>
                    <input type="file" class="form-control" id="photo" name="photo" value="{{ $etudiants->photo }}">
                </div>

                <div class="form-group">
                    <label for="Tuteur">Tuteur</label>
                    <select class="form-control" name="tuteur">
                        @foreach ($tuteurs as $tuteur)
                            <option value="{{ $tuteur->id }}" {{ $etudiants->tuteur_id == $tuteur->id ? 'selected' : '' }}>
                                {{ $tuteur->nom_prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">MODIFIER UN ETUDIANT</button>

                <br> <br />
                <a href="/etudiant" class="btn btn-danger"> Revenir à la liste des étudiants</a>

            </form> --}}
        </div>
    </div>

    <script src="bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>