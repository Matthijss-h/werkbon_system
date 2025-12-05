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
            <ul class="right ">
                <li><a class="waves-effect waves-light btn indigo">Nieuwe Werkbon<i
                            class="material-icons left">add</i></a></li>
            </ul>
        </div>
    </nav>

<div class="container section">
    <div class="row">
        <div class="col s6 m6 center-align">
            <a href="{{ route('workorders.index', 'open') }}" 
               class="waves-effect waves-light btn-large {{ request()->is('workorders/open') ? 'amber' : 'amber lighten-3' }} col s12">
                <i class="material-icons left">lock_open</i>Openstaand
            </a>
        </div>
        <div class="col s6 m6 center-align">
            <a href="{{ route('workorders.index', 'closed') }}" 
               class="waves-effect waves-light btn-large {{ request()->is('workorders/closed') ? 'green lighten-1' : 'green lighten-4' }} col s12">
                <i class="material-icons left">lock</i>Afgerond
            </a>
        </div>
    </div>
</div>

    {{ $slot }}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
