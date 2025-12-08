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
                        <div id="materials_section">
                            <div id="materials_1" class="row">
                                {{-- Material name and quantity inputs --}}
                                <div class="col s8 m9">
                                    <div class="row" style="margin-bottom: 0;">
                                        {{-- Material name --}}
                                        <div class="col s6">
                                            <input type="text" name="material_name[]"
                                                placeholder="Materiaal naam" class="white-text">
                                        </div>
                                        {{-- Material quantity --}}
                                        <div class="col s6">
                                            <input type="number" name="material_quantity[]"
                                                placeholder="Aantal" class="white-text">
                                        </div>
                                    </div>
                                </div>
    
                                {{-- Add material button --}}
                                <div id="add_material_btn_div" class="col s4 m3">
                                    <a class="btn-floating" id="add_material_btn"><i class="material-icons">add</i></a>
                                </div>
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
            let addedMaterialsButton = document.querySelector('#add_material_btn');
            let materialsSection = document.querySelector('#materials_section');
            let countMaterialInputs = materialsSection.childElementCount;
            
            // Initialize Materialize datepicker when page loads
            document.addEventListener('DOMContentLoaded', function() {
                // Select all datepicker elements
                var elems = document.querySelectorAll('.datepicker');

                addedMaterialsButton.addEventListener('click', addMaterialButtonClick);

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

            function addMaterialButtonClick(e) {
                    e.preventDefault();
                    
                    countMaterialInputs = materialsSection.childElementCount;
                    
                    // Create a new row for material inputs
                    let newMaterialRow = document.createElement('div');
                    newMaterialRow.classList.add('row');
                    newMaterialRow.style.marginBottom = '0';
                    newMaterialRow.id = `materials_${countMaterialInputs + 1}`;

                    // Create material_inputs div
                    let materialsInputsDiv = document.createElement('div');
                    materialsInputsDiv.classList.add('col', 's8', 'm9');

                    // Create inner row div
                    let innerRowDiv = document.createElement('div');
                    innerRowDiv.classList.add('row');
                    innerRowDiv.style.marginBottom = '0';

                    // Create material name and quantity divs and inputs
                    let materialNameDiv = document.createElement('div');
                    materialNameDiv.classList.add('col', 's6');
                    let materialQuantityDiv = document.createElement('div');
                    materialQuantityDiv.classList.add('col', 's6');
                    let materialNameInput = document.createElement('input');
                    materialNameInput.type = 'text';
                    materialNameInput.name = 'material_name[]';
                    materialNameInput.placeholder = 'Materiaal naam';
                    materialNameInput.classList.add('white-text');
                    let materialQuantityInput = document.createElement('input');
                    materialQuantityInput.type = 'number';
                    materialQuantityInput.name = 'material_quantity[]';
                    materialQuantityInput.placeholder = 'Aantal';
                    materialQuantityInput.classList.add('white-text');

                    // Remove add button from previous row
                    let previousRowDiv = document.querySelector(
                        `#materials_${countMaterialInputs}`);
                    previousRowDiv.removeChild(previousRowDiv.children[1]);

                    // Append inputs to their respective divs
                    materialNameDiv.appendChild(materialNameInput);
                    materialQuantityDiv.appendChild(materialQuantityInput);

                    // Append material name and quantity divs to inner row
                    innerRowDiv.appendChild(materialNameDiv);
                    innerRowDiv.appendChild(materialQuantityDiv);

                    // Append inner row to materialsInputsDiv
                    materialsInputsDiv.appendChild(innerRowDiv);

                    // Create add material button div
                    let addMaterialButtonDiv = document.createElement('div');
                    addMaterialButtonDiv.id = 'add_material_btn_div';
                    addMaterialButtonDiv.classList.add('col', 's4', 'm3');
                    let addMaterialButton = document.createElement('a');
                    addMaterialButton.classList.add('btn-floating');
                    addMaterialButton.id = 'add_material_btn';
                    let addIcon = document.createElement('i');  
                    addIcon.classList.add('material-icons');
                    addIcon.textContent = 'add';
                    addMaterialButton.appendChild(addIcon);
                    addMaterialButtonDiv.appendChild(addMaterialButton);

                    // Append materialsInputsDiv and add button div to new row
                    newMaterialRow.appendChild(materialsInputsDiv);
                    newMaterialRow.appendChild(addMaterialButtonDiv);

                    // Append the new row to the materials section
                    materialsSection.appendChild(newMaterialRow);

                    // Renew event listener for the new add button
                    addedMaterialsButton = document.querySelector('#add_material_btn');
                    addedMaterialsButton.addEventListener('click', addMaterialButtonClick);
                }

        </script>
</x-layout>