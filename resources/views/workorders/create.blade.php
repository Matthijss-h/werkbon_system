<x-layout>
    {{-- Container for the create workorder page --}}
    <div class="container section">
        {{-- Back button row --}}
        <div class="row">
            <div class="col s12">
                <a href="{{ route('workorders.index', ['status' => 'open']) }}" class="waves-effect waves-light btn grey">
                    <i class="material-icons left">arrow_back</i>Terug
                </a>
            </div>
        </div>

        <form action="{{ route('workorders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Main workorder details card --}}
        <div class="row">
            <div class="col s10 m10 offset-s1 offset-m1">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        {{-- Employee name input field --}}
                        <span class="card-title">
                            <i class="material-icons left">person</i>Voeg medewerker naam toe:
                            <input type="text" id="employee_name" name="employee_name" placeholder="Naam medewerker"
                                class="white-text">
                        </span>

                        {{-- Workorder description input field --}}
                        <i class="material-icons left">description</i>Werkbon beschrijving:
                        <input type="text" id="description" name="description" placeholder="Beschrijving werkbon"
                            class="white-text">
                        
                        {{-- Start and end date row --}}
                        <div class="row">
                            {{-- Start date input --}}
                            <div class="col s12 m6 ">
                                <label class="white-text" for="start_date">Begin datum:</label>
                                <input id="start_date" name="start_date" type="text" placeholder="dd-mm-jjjj"
                                    class="datepicker white-text">
                            </div>
                            {{-- End date input --}}
                            <div class="col s12 m6">
                                <label class="white-text" for="end_date">Eind datum:</label>
                                <input id="end_date" name="end_date" type="text" placeholder="dd-mm-jjjj"
                                    class="datepicker white-text">
                            </div>
                        </div>

                        
                        {{-- Materials section header --}}
                        <div class="row">
                            <div class="col s12">
                                <i class="material-icons left">build</i>
                                <span class="white-text">Materialen toevoegen:</span>
                            </div>
                        </div>

                        {{-- Materials input row --}}
                        <div class="row">
                            {{-- Material name and quantity inputs --}}
                            <div class="col s8 m9">
                                <div class="row" style="margin-bottom: 0;">
                                    {{-- Material name --}}
                                    <div class="col s6">
                                        <input type="text" id="material_name" name="material_name"
                                            placeholder="Materiaal naam" class="white-text">
                                    </div>
                                    {{-- Material quantity --}}
                                    <div class="col s6">
                                        <input type="number" id="material_quantity" name="material_quantity"
                                            placeholder="Aantal" class="white-text">
                                    </div>
                                </div>
                            </div>

                            {{-- Add material button --}}
                            <div class="col s4 m3">
                                <a class="btn-floating"><i class="material-icons">add</i></a>
                            </div>
                        </div>

                        {{-- Photo upload input --}}
                        <i class="material-icons left">photo</i>Foto toevoegen:
                        <input type="file" id="photo" name="photo" accept="image/*" class="white-text">
                    </div> 

                    {{-- Form action buttons --}}
                    <div class="card-action">
                        <div class="row" style="margin-bottom: 0;">
                            {{-- Cancel button --}}
                            <div class="col s6 center">
                                <a href="{{ route('workorders.index', ['status' => 'open']) }}"
                                    class="waves-effect waves-light btn grey">
                                    <i class="material-icons left">cancel</i>Annuleren
                                </a>
                            </div>
                            {{-- Save button --}}
                            <div class="col s6 center">
                                <button type="submit" class="waves-effect waves-light btn green darken-1">
                                    <i class="material-icons left">check</i>Opslaan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <script>
            // Initialize Materialize datepicker when page loads
            document.addEventListener('DOMContentLoaded', function() {
                // Select all datepicker elements
                var elems = document.querySelectorAll('.datepicker');

                // Configure datepicker options with Dutch localization
                var options = {
                    format: 'dd-mm-yyyy',
                    autoClose: true,
                    firstDay: 1,
                    i18n: {
                        cancel: 'Annuleer',
                        done: 'OK',
                        months: ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus',
                            'September', 'Oktober', 'November', 'December'
                        ],
                        monthsShort: ['Jan', 'Feb', 'Mrt', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov',
                            'Dec'
                        ],
                        weekdays: ['Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag'],
                        weekdaysShort: ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'],
                        weekdaysAbbrev: ['Z', 'M', 'D', 'W', 'D', 'V', 'Z']
                    },
                };

                // Initialize datepicker on all selected elements
                M.Datepicker.init(elems, options);
            });
        </script>
</x-layout>