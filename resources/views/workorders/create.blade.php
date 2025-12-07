<x-layout>
    <div class="container section">
        <div class="row">
            <div class="col s12">
                <a href="{{ route('workorders.index', ['status' => 'open']) }}" class="waves-effect waves-light btn grey">
                    <i class="material-icons left">arrow_back</i>Terug
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col s10 m10 offset-s1 offset-m1">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">
                            <i class="material-icons left">person</i>Voeg medewerker naam toe:
                            <input type="text" id="employee_name" name="employee_name" class="white-text">
                        </span>

                        <i class="material-icons left">description</i>Werkbon beschrijving:
                        <input type="text" id="description" name="description" class="white-text">

                        <div class="row">
                            <div class="col s12 m6 ">
                                <label class="white-text" for="start_date">Begin datum:</label>
                                <input id="start_date" type="text" class="datepicker white-text">
                            </div>
                            <div class="col s12 m6">
                                <label class="white-text" for="end_date">Eind datum:</label>
                                <input id="end_date" type="text" class="datepicker white-text">
                            </div>
                        </div>
                        <i class="material-icons left">build</i>Materialen toevoegen:
                        <input type="text" id="description" name="description" class="white-text">

                        <i class="material-icons left">photo</i>Foto toevoegen:
                        <input type="file" id="photo" name="photo" accept="image/*" class="white-text">
                    </div>

                    <div class="card-action">
                        <div class="row" style="margin-bottom: 0;">
                            <div class="col s6 center">
                                <a href="{{ route('workorders.index', ['status' => 'open']) }}"
                                    class="waves-effect waves-light btn grey">
                                    <i class="material-icons left">cancel</i>Annuleren
                                </a>
                            </div>
                            <div class="col s6 center">
                                <a href="" class="waves-effect waves-light btn green darken-1">
                                    <i class="material-icons left">check</i>Opslaan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.datepicker');

                // Define options (optional)
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

                M.Datepicker.init(elems, options);
            });
        </script>
</x-layout>
