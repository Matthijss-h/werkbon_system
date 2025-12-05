<x-layout>
    <div class="container">
    @foreach ($workorders as $workorder)
        <div class="row">
            <div class="col s10 m10 offset-s1 offset-m1">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title"><i class="material-icons left">person</i>{{ $workorder->employee_name }}</span>
                        <p>{{ $workorder->description }}</p>
                    </div>
                    <div class="card-action">
                        <div class="row" style="margin-bottom: 0;">
                            <div class="col s6 center">
                                <a href="#" class="waves-effect waves-light btn blue">
                                    <i class="material-icons left">visibility</i>Bekijken
                                </a>
                            </div>
                            <div class="col s6 center">
                                <a href="#" class="waves-effect waves-light btn green darken-1">
                                    <i class="material-icons left">check</i>Afronden
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>


    </div>
</x-layout>
