// // Ajoute un champ input d'ingrédient au formulaire d'ajout de cocktail
// function addIngredient() {
//     // Obtenez la référence du conteneur d'ingrédients dans le formulaire
//     let container = document.getElementById("ingredientsContainer");


//     // Créez une nouvelle étiquette (label) pour l'ingrédient
//     let newLabel = document.createElement("label");
//     newLabel.for = "ingredient";
//     newLabel.className = "mt-5 col-md-5";
//     newLabel.innerHTML = "Ingredient: * ";

//     // Créez un nouvel input pour l'ingrédient
//     let newInput = document.createElement("input");
//     newInput.type = "text";
//     newInput.id = "ingredient";
//     newInput.name = "ingredient";
//     newInput.className = "mt-5 col-md-4";
//     newInput.required = true;

//     // Ajoutez la nouvelle étiquette et le nouvel input au conteneur
//     container.appendChild(newLabel);
//     container.appendChild(newInput);
// }

// // Ajoute un champ input d'étape au formulaire d'ajout de cocktail
// function addStage() {
//     // Obtenez la référence du conteneur d'ingrédients dans le formulaire
//     let container = document.getElementById("stageContainer");


//     // Créez une nouvelle étiquette (label) pour l'ingrédient
//     let newLabel = document.createElement("label");
//     newLabel.for = "stage";
//     newLabel.className = "mt-5 col-md-5";
//     newLabel.innerHTML = "Etape: * ";

//     // Créez un nouvel input pour l'ingrédient
//     let newInput = document.createElement("input");
//     newInput.type = "text";
//     newInput.id = "stage";
//     newInput.name = "stage";
//     newInput.className = "mt-5 col-md-4";
//     newInput.required = true;

//     // Ajoutez la nouvelle étiquette et le nouvel input au conteneur
//     container.appendChild(newLabel);
//     container.appendChild(newInput);
// }


// function validateForm(event) {
//     let form = document.getElementById("cocktailForm");
//     let requiredInputs = form.querySelectorAll("[require]");
//     let validationMessage = document.getElementById("validationMessage");

//     // Efface le message de validation précédent
//     validationMessage.innerHTML = '';

//     for (let input of requiredInputs) {
//         if (!input.value.trim()) {
//             // Affiche un message de validation
//             validationMessage.innerHTML = 'Veuillez remplir tous les champs obligatoires.';
//             event.preventDefault(); // Empêche l'envoi du formulaire
//             return false;
//         }
//     }
    
//     return true;
// }

// // Ajoute des écouteurs d'événements aux boutons après le chargement du DOM
// document.addEventListener("DOMContentLoaded", function () {
//     document.getElementById("cocktailForm").addEventListener("submit", validateForm);
//     document.getElementById("addIngredientBtn").addEventListener("click", addIngredient);
//     document.getElementById("addStageBtn").addEventListener("click", addStage);
// });