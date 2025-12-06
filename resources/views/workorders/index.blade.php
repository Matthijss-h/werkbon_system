<x-layout>

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

    <div class="container">
        @foreach ($workorders as $workorder)
            <div class="row">
                <div class="col s10 m10 offset-s1 offset-m1">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title"><i
                                    class="material-icons left">person</i>{{ $workorder->employee_name }}</span>
                            <p>{{ $workorder->description }}</p>
                        </div>
                        <div class="card-action">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s6 center">
                                    <a href="" class="waves-effect waves-light btn blue">
                                        <i class="material-icons left">visibility</i>Bekijken
                                    </a>
                                </div>
                                <div class="col s6 center">
                                    <a href="" class="waves-effect waves-light btn green darken-1">
                                        <i class="material-icons left">check</i>Afronden
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</x-layout>
