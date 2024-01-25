<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stwórz własną pizzę</title>
    @include('layouts.imports')
</head>
<body class="antialiased bg-simple">
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="table-container">
                    <h1 class="font-semibold text-light bg-custom-dark p-4 rounded-3 dynamic-shadow" style="font-size: 3em; margin-bottom: 1em;">Stwórz własną pizzę</h1>
                    <form role="form" action="{{ route('pizzaCreate') }}" id="restaurant-order-form" method="post" enctype="multipart/form-data" class="bg-dark rounded-3 dynamic-shadow p-4">
                        {{ csrf_field() }}
                        <div class="mb-3 text-light">
                            Waga ciasta: <input type="number" class="form-control" name="doughWeight" min="100" max="500" step="10" value="250">
                        </div>
                        <div class="mb-3  text-light">
                            Liczba składników: <input type="number" class="form-control" name="ingredients" min="1" max="7" step="1" value="1" onchange="showIngredientsOptions()">
                        </div>
                        <div id="ingredients-options">
                            <div class="mb-3">
                                <select class="form-select" name="ingredient1">
                                    @foreach ($ingredientsList as $ingredient)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control" name="ingredient1amount" min="0.5" max="3" step="0.5" value="1">
                            </div>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif
                        <a href="{{ route('restaurant') }}" class="btn btn-secondary mt-4">Powrót</a>
                        <input type="submit" class="btn btn-primary btn-custom mt-4" value="Zamów">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let list = [];
        let previousValue = 1;
        let ingredientsList = @json($ingredientsList);
        ingredientsList = Object.values(ingredientsList);

        console.log(ingredientsList);

        function showIngredientsOptions() {
            let ingredientsOptions = document.getElementById("ingredients-options");
            let ingredientsNumber = document.getElementsByName("ingredients")[0].value;

            if (ingredientsNumber > previousValue) {
                for (let i = previousValue + 1; i <= ingredientsNumber; i++) {
                    let div = document.createElement("div");
                    div.className = "mb-3";
                    let select = document.createElement("select");
                    select.className = "form-select";
                    select.name = "ingredient" + i;
                    let defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.text = "Wybierz składnik";
                    defaultOption.selected = true;
                    defaultOption.disabled = true;
                    defaultOption.hidden = true;
                    select.appendChild(defaultOption);
                    for (let j = 0; j < ingredientsList.length; j++) {
                        let option = document.createElement("option");
                        option.value = ingredientsList[j].id;
                        option.text = ingredientsList[j].name;
                        select.appendChild(option);
                    }
                    div.appendChild(select);

                    let input = document.createElement("input");
                    input.type = "number";
                    input.className = "form-control";
                    input.name = "ingredient" + i + "amount";
                    input.min = "0.5";
                    input.max = "3";
                    input.step = "0.5";
                    input.value = "1";
                    div.appendChild(input);
                    ingredientsOptions.appendChild(div);
                }
            }
            else if (ingredientsNumber < previousValue) {
                for (let i = previousValue; i > ingredientsNumber; i--) {
                    ingredientsOptions.removeChild(ingredientsOptions.lastChild);
                }
            }

            previousValue = parseInt(ingredientsNumber);  
        }
    </script>
</body>
</html>
