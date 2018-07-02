 function addIngredientsField(){
    var input = document.createElement("input");
    input.setAttribute('type', 'text');
    input.setAttribute('class', 'ingred mb-5');

    var parent = document.getElementById("ingredients-form-field");
    parent.appendChild(input);
}

function addStepsField(){
    var input = document.createElement("input");
    input.setAttribute('type', 'text');
    input.setAttribute('class', 'step mb-5');

    var parent = document.getElementById("steps-form-field");
    parent.appendChild(input);
}
var output = [];
var outputSteps = [];
function recipeBuilder(){
    $('.ingred').each(function( i, obj ) {
        if (obj.value != "")
      output.push(obj.value);
      });
      var outputJSON = JSON.stringify(output);
      console.log("ingred", outputJSON);
    document.getElementById('ingredients').value = outputJSON;

    $('.step').each(function( i, obj ) {
        if (obj.value != "")
        outputSteps.push(obj.value);
      });
      var outputStepsJSON = JSON.stringify(outputSteps);
      console.log("step", outputStepsJSON);
    document.getElementById('steps').value = outputStepsJSON;
}