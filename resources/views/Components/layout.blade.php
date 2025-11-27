<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Werkbonnen</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo" style="margin-left: 15px;">Werkbonnen</a>
            <ul class="right hide-on-med-and-down">
                <li><a class="waves-effect waves-light btn indigo">Nieuwe Werkbon<i
                            class="material-icons left">add</i></a></li>
            </ul>
        </div>
    </nav>

    <div class="container section">
        <div class="row">
            <div class="col s6 m6 center-align">
                <a href="#" class="waves-effect waves-light btn-large amber col s12 text-white">
                    <i class="material-icons left">lock_open</i>Openstaand
                </a>
            </div>
            <div class="col s6 m6 center-align">
                <a href="#" class="waves-effect waves-light btn-large green lighten-1 col s12">
                    <i class="material-icons left">lock</i>Afgerond
                </a>
            </div>
        </div>
    </div>

    {{ $slot }}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
