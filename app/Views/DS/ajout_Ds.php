<div class=" ml-10 ChoixSemestre">
     <h1> Sélectionner le semestre : </h1>
</div>

<div class="ml-10 mt-5 EnsembleSemestres w-1/2 border border-gray-500 flex flex-row ">
    <div class="flex flex-col w-full justify-center">
        <div>
            <h3 class="text-center border border-gray-500">BUT 1</h3>
        </div>
        <div class="flex flex-row justify-center  border border-gray-500   border-collapse">
            <?php for ($i = 1; $i <= 2; $i++) : ?>
                <div class="mb-2 border p-2 m-2 cursor-pointer" onclick="handleClick(this, <?=$i?>)" >
                    <h3>Semestre <?=$i?></h3>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="flex flex-col w-full justify-center">
        <div>
            <h3 class="text-center border border-gray-500">BUT 2</h3>
        </div>
        <div class="flex flex-row justify-center border border-gray-500  border-collapse">
            <?php for ($i = 3; $i <= 4; $i++) : ?>
                <div class="mb-2 border p-2 m-2 cursor-pointer" onclick="handleClick(this, <?=$i?>)" >
                    <h3>Semestre <?=$i?></h3>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="flex flex-col w-full justify-center">
        <div>
            <h3 class="text-center border border-gray-500">BUT 3</h3>
        </div>
        <div class="flex flex-row justify-center border border-gray-500 border-collapse">
            <?php for ($i = 5; $i <= 6; $i++) : ?>
                <div class="mb-2 border p-2 m-2 cursor-pointer" onclick="handleClick(this, <?=$i?>)" >
                    <h3>Semestre <?=$i?></h3>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>



<?php if (isset($ressources)) : ?>
    <div class="ml-10 mt-5 ChoixRessource">
        <h1>Sélectionner la ressource :</h1>
    </div>
    <div class="flex">
        <div class=" w-1/5">
            <div class="ml-10 mt-5 flex flex-col border border-gray-400 rounded-xl w-auto text-center mr-auto">
                <?php $totalRessources = count($ressources); ?>
                <?php foreach ($ressources as $key => $ressource) : ?>
                    <div class="mb-2 p-2 cursor-pointer w-full ressource <?php echo ($key < $totalRessources - 1) ? 'border-b' : ''; ?> border-gray-400 rounded-br rounded-bl"
                         onclick="showForm('<?=$ressource['nomres']?>')">
                        <h3><?=$ressource['nomres']?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="formulaireContainer" style="display: none; width: 500px; height: 400px; " class="flex border border-gray-600 ">
            <!-- Le formulaire préconstruit initialement caché -->
            <div class="h-full">
                <form id="prebuiltForm" class="text-center h-1/2">
                    <h3 id="nomRessourcePlaceholder"></h3>

                    <div class="flex justify-center">
                        <div class="flex flex-col w-1/2">
                            <div class="mb-2 p-2 rounded text-right">
                                <label for="date">Date :</label>
                            </div>
                            <div class="mb-2 p-2 rounded text-right">
                                <label>Type :</label>
                            </div>
                            <div class="mb-2 p-2 rounded text-right">
                                <label for="duree">Durée :</label>
                            </div>
                            <div class="mb-2 p-2 rounded text-right">
                                <label for="enseignant">Enseignant concerné :</label>
                            </div>
                        </div>
                        <div class="flex flex-col w-3/4">
                            <div class="mb-2 p-2 rounded">
                                <input type="date" id="date" name="date">
                            </div>
                            <div class="mb-2 p-2 flex justify-center rounded">
                                <div class="flex justify-start mb-2">
                                    <label class="mr-4">
                                        <input type="radio" name="type" value="papier"> Papier
                                    </label>
                                    <label>
                                        <input type="radio" name="type" value="machine"> Machine
                                    </label>
                                </div>
                            </div>
                            <div class="mb-2 rounded">
                                <select id="duree" name="duree">
                                    <option value="1">1 heure</option>
                                    <option value="2">2 heures</option>
                                    <option value="3">3 heures</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                            </div>
                            <div class="mb-2 p-2 rounded">
                                <select id="enseignant" name="enseignant">
                                    <option value="1">M. Dupont</option>
                                    <option value="2">Mme. Durand</option>
                                    <option value="3">M. Martin</option>
                                    <!-- Ajoutez d'autres options selon vos besoins -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>

<script>

    function handleClick(element, semesterNumber) {
        // Ajouter le style de fond au clic
        element.style.backgroundColor = '#adbfcf';

        // Faire autre chose (par exemple, naviguer vers une autre page)
        window.location.href = '<?=site_url('afficherRessourcesParSemestre/')?>' + semesterNumber;
    }

    function showForm(nomRessource) {
        // Réinitialisez la couleur de fond de toutes les ressources
        var ressources = document.querySelectorAll('.ressource');
        ressources.forEach(function (ressource) {
            ressource.style.backgroundColor = '';
        });

        // Définissez la couleur de fond de la nouvelle ressource
        event.currentTarget.style.backgroundColor = '#adbfcf';

        // Rendre le formulaire visible
        document.getElementById('formulaireContainer').style.display = 'block';

        // Mettez à jour le nom de la ressource dans le formulaire
        document.getElementById('nomRessourcePlaceholder').innerText = nomRessource;
    }
</script>