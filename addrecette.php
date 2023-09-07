<?php
require_once 'layout/headerAddRecette.php';
require_once 'functions/addrecipe.php';

// Add News Recipe
if (isset($_POST['title']) && 
    isset($_POST['author']) && 
    isset($_POST['publication_date']) && 
    isset($_POST['ingredient']) && 
    isset($_POST['cooking_tool']) && 
    isset($_POST['steps']) && 
    isset($_POST['categories_id'])
    ) { 
        require_once 'functions/addrecipe.php';
        try {
        $newrecipe = addRecipes();
        } catch (PDOException) {
            echo "Erreur lors de la requête";
            exit;
        }
}
?>


<div><h2 class="d-flex justify-content-center align-items-center  pb-2 mb-5 mt-5">Ajouter une nouvelle recette</h2></div>

<div class="container mt-4">
    <div class="row">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <!-- left part -->
                    <div class="mb-3">
                        <label for="title" class="form-label mb-2">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Votre titre" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="img_principale" class="form-label mb-2">Image principale</label>
                            <input type="file" class="form-control" id="img_principale" name="img_principale" accept="image/*" style="font-size:14px;">
                        </div>

                        <div class="col-md-6">
                            <label for="additionalImages" class="form-label mb-2">Images complémentaires</label>
                            <input type="file" class="form-control" id="additionalImages" name="additionalImages" accept="image/*" multiple style="font-size:14px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label mb-2">Auteur</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="L'auteur" required>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="categories_id" class="form-label mb-2">Catégorie</label>
                            <select class="form-select" id="categories_id" name="categories_id">
                                <option name="Entrée" value="1">Entrée</option>
                                <option name="Plat chaud" value="2">Plat chaud</option>
                                <option name="Plat froid" value="3">Plat froid</option>
                                <option name="Dessert" value="4">Dessert</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="publication_date" class="form-label mb-2">Date de publication</label>
                            <input type="date" class="form-control" id="publication_date" name="publication_date" required style="font-size:15px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="ingredient" class="form-label mb-2">Ingrédients (un par ligne)</label>
                        <textarea class="form-control" id="ingredient" name="ingredient" rows="4" placeholder="Vos ingrédients ..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="cooking_tool" class="form-label mb-2">Ustensiles (un par ligne)</label>
                        <textarea class="form-control" id="cooking_tool" name="cooking_tool" rows="4" placeholder="Vos ustensiles ..." required></textarea>
                    </div>
                </div>

                <!-- Right part -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="steps" class="form-label">Étapes de préparation (une par ligne)</label>
                        <textarea class="form-control" id="steps" name="steps" rows="25" placeholder="Vos étapes de préparation. 
        - étape 1 : votre texte ici .... 
        - étapes 2 : votre texte ici .... 
        - etc ..." required>
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center mt-3">
                <button class="btn btn-outline-light mb-4" id="btn_addnew" type="submit" role="button">Publier</button>
            </div>
        </form>
    </div>
</div>


            

<!-- Right part - Version 2 (JS) -->
        <!-- <div class="col-md-6 ">
            <label for="steps" class="form-label mb-4">Étapes de préparation</label>
            <ol id="step-list">
                <li><textarea class="form-control mb-2" rows="3" placeholder="Étape 1"></textarea></li>
            </ol>

            <div id="step-list">
                <button id="add-step-btn" class="btn btn-primary">Ajouter une étape</button>
            </div>
        </div> -->
<!-- <script>
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
</script> -->

    </body>
</html>