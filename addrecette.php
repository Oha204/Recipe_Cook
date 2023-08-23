<?php
require_once 'layout/headerAddRecette.php';
?>


<div><h2 class="d-flex justify-content-center align-items-center  pb-2 mb-5 mt-5">Ajouter une nouvelle recette</h2></div>

<div class="container mt-4">
    <div class="row">
        <!-- left part -->
        <div class="col-md-6" style="padding-right: 50px;">
            <form >
                <div class="mb-3">
                    <label for="title" class="form-label mb-2">Titre</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="mainImage" class="form-label mb-2" >Image principale</label>
                        <input type="file" class="form-control" id="mainImage" name="mainImage" accept="image/*" required style="font-size:14px;">
                    </div>

                    <div class="col-md-6">
                        <label for="additionalImages" class="form-label mb-2">Images complémentaires</label>
                        <input type="file" class="form-control" id="additionalImages" name="additionalImages" accept="image/*" multiple style="font-size:14px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label mb-2">Auteur</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>
            
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category" class="form-label mb-2">Catégorie</label>
                        <select class="form-select" id="category" name="category">
                        <option value="entree">Entrée</option>
                        <option value="plat_chaud">Plat chaud</option>
                        <option value="plat_froid">Plat froid</option>
                        <option value="dessert">Dessert</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="date" class="form-label mb-2">Date de publication</label>
                        <input type="date" class="form-control" id="date" name="date" required style="font-size:15px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="ingredients" class="form-label mb-2">Ingrédients (un par ligne)</label>
                    <textarea class="form-control" id="ingredients" name="ingredients" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="utensils" class="form-label mb-2">Ustensiles (un par ligne)</label>
                    <textarea class="form-control" id="utensils" name="utensils" rows="4" required></textarea>
                </div>
            </form>
        </div>

<!-- Right part v2 
    <div class="mb-3">
        <label for="steps" class="form-label">Étapes de préparation (une par ligne)</label>
        <textarea class="form-control" id="steps" name="steps" rows="6" required></textarea>
    </div>
-->

        <!-- Right part -->
        <div class="col-md-6 ">
            <label for="steps" class="form-label mb-4">Étapes de préparation</label>
            <ol id="step-list">
                <li><textarea class="form-control mb-2" rows="3" placeholder="Étape 1"></textarea></li>
            </ol>

            <div id="step-list">
                <button id="add-step-btn" class="btn btn-primary">Ajouter une étape</button>
            </div>
        </div>

<script>
    const stepList = document.getElementById("step-list");
    // Fonction pour ajouter/supprimer une nouvelle étape à la liste
    function addStep() {
        const newStep = document.createElement("li");
        newStep.innerHTML = `
            <textarea class="form-control" rows="3" placeholder="Étape ${stepList.children.length + 1}"></textarea>
            <button class="btn btn-danger delete-step-btn mt-2 px-0 py-0">
                <img src="assets/icons/x-mark.png" style="width:20px;" class="mx-1 my-1"></img>
            </button>
        `;
        stepList.appendChild(newStep);
        renumberSteps();
        
        const deleteStepButton = newStep.querySelector(".delete-step-btn");
        deleteStepButton.addEventListener("click", () => {
            stepList.removeChild(newStep);
            renumberSteps();
        });
    }
    // action bouton ajouter une étape
    const addButton = document.getElementById("add-step-btn");
    addButton.addEventListener("click", addStep);

    // Fonction pour renuméroter les étapes après la suppression
    function renumberSteps() {
        const steps = stepList.querySelectorAll("li");
        steps.forEach((step, index) => {
            const textarea = step.querySelector("textarea");
            const deleteStepButton = step.querySelector(".delete-step-btn");
            textarea.setAttribute("placeholder", `Étape ${index + 1}`);
        });
    }
</script>

    
</div>
</div>

    </body>
</html>