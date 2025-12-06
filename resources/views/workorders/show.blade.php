<x-layout>
    <div class="container section">
        <div class="row">
            <div class="col s12">
                <a href="{{ route('workorders.index', $workorder->status) }}" class="waves-effect waves-light btn grey">
                    <i class="material-icons left">arrow_back</i>Terug
                </a>
            </div>
        </div>


            <div class="row">
                <div class="col s10 m10 offset-s1 offset-m1">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title"><i class="material-icons left">person</i>{{ $workorder->employee_name }}</span>
                            <p>{{ $workorder->description }}</p>
                        </div>
                        <div class="card-action">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s6 center white-text">
                                    <i class="material-icons left">calendar_today</i><strong>Start datum & tijd: </strong>{{ $workorder->start }}
                                </div>
                                <div class="col s6 center white-text">
                                    <i class="material-icons left">calendar_today</i><strong>Eind datum & tijd: </strong>{{ $workorder->end }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10 offset-s1 offset-m1">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title"><i class="material-icons left">build</i>Materialen</span>
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>Naam</th>
                                        <th>Aantal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($workorder->materials as $material)
                                    <tr>
                                        <td>{{ $material->name }}</td>
                                        <td>{{ $material->quantity }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s10 m10 offset-s1 offset-m1">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title"><i class="material-icons left">photo</i>Foto's</span>
                            <div class="row">
                                @foreach($workorder->photos as $photo)
                                <div class="col s12 m6 l4">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="{{ $photo->url }}" alt="Werkbon foto">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-layout>