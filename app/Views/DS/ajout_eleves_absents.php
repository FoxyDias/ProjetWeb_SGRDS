<?php

$semestre = 1;
$matiere = "InitInitInitInitI nitInitInitInitInitInitInitInitInitInitIn itInitInitInit";
$date = "26/09/23";
$type = "machine";
$duree = "1h30";
$enseignant = "Philippe LEPIVERT";

?>
<script>
    class Eleve {
        constructor(nom, prenom, id) {
            this.id = id;
            this.nom = nom;
            this.prenom = prenom;
            this.absent = false;
            this.justifie = false;
        }

        getId() {
            return this.id;
        }
        getNom() {
            return this.nom;
        }

        getPrenom() {
            return this.prenom;
        }

        setAbsent(etat){
            this.absent = etat;
        }

        setJustifie(etat){
            this.justifie = etat;
        }

        isAbsent() {
            return this.absent;
        }

        isJustifie() {
            return this.justifie;
        }
    }
    var listeEleve = [];

</script>

<div>
    <!--Div contenant la flèche et le rappel des infos entrées auparavant -->
    <div class="w-3/5 flex flex-row justify-between">

        <!--Flèche de retours -->
        <div class="inline-block">
            <a href="./ajoutds">
                <img src="<?= base_url('/images/fleche_retour.png'); ?>"  >
            </a>
        </div>

        <!--Rappel des infos -->
        <div class="flex border-8 items-center border-gray-400 rounded-full pl-8 pr-8">

            <!--Semestre et matière -->
            <div class="mr-4">
                <h3 class="text-center w-3/4"> <?php
                    echo "Semestre " . $infoRessource[0]['semres'] . " - ".$infoRessource[0]['nomres'];
                    ?></h3>
            </div>

            <!--Date, type et durée -->
            <div class="flex items-center justify-center">
                <h3 class="text-center"> <?php
                    echo $infoDevoir['datedevoir'] . " - DS ".$infoDevoir['typedevoir']." - ".$infoDevoir['dureedevoir'];
                    echo "<br>".$infoEnseignant['nomens']. " " . $infoEnseignant['prenomens'];
                    ?></h3>
            </div>
        </div>
    </div>

    <!--Div contenant les deux textes + tableaux associés -->
    <div class="flex justify-between">
        <div class=" w-1/5">

            <!--Texte du choix des élèves absents -->
            <h3 class="flex justify-center mt-8 ml-4"> Sélectionner le(s) élève(s) absent(s) </h3>

            <!--Tableau de la liste des élèves de la promotion choisis-->
            <div class="ml-10 mt-5 flex flex-col border border-gray-400 rounded-xl w-auto text-center mr-auto">
                <?php $nombreEleves = count($eleves); $cpt=0?>
                <?php foreach ($eleves as $key => $eleve) : ?>
                    <div class="mb-2 p-2 cursor-pointer w-full eleve <?php echo ($key < $nombreEleves - 1) ? 'border-b' : ''; ?> border-gray-400 rounded-br rounded-bl">
                        <h3><?=$eleve['nometu']." ".$eleve['prenometu']?></h3>
                    </div>
                    <script>
                        var eleve = new Eleve("<?=$eleve['nometu']?>", "<?=$eleve['prenometu']?>", <?=$id[$cpt++]['idetu']?>);
                        listeEleve.push(eleve);
                    </script>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="w-1/2">
            <div class="flex flex-col items-center">
                <!--Texte du choix des élèves absents justifiés-->
                <div><h3 class="flex justify-center mt-8 ml-4"> Précisez ceux qui ont justifiés  </h3>
                </div>
                <!--Tableau de la liste des élèves absents-->
                <div class="w-1/3 ">
                    <div class="ml-10 mt-5 flex flex-col border border-gray-400 rounded-xl w-auto text-center mr-auto">
                        <div class="deuxieme_tableau"></div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-10">
                <form id="formAbsence" action="<?= base_url('ajout_etudiants_absents/traitement')?>" method="post">
                    <input id="donnees_js" name="donnees_js" type="hidden" value="" />
                    <input type="submit" value="Valider" id="btnEnvoyer"/>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ajoutez le script JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function()
    {
        var eleves = document.querySelectorAll('.eleve');
        var tableau = document.querySelector('.deuxieme_tableau');

        // Gestion des évènements lié au premier tableau
        eleves.forEach(function(eleve)
        {
            eleve.addEventListener('click', function()
            {
                eleveTrouve = listeEleve.find(function(eleveDeLaListe) {return eleveDeLaListe.nom + " " + eleveDeLaListe.prenom === eleve.innerText;});

                var elevePresentDansTableau = tableau.querySelector('h3[data-nom="' + eleveTrouve.nom + '"][data-prenom="' + eleveTrouve.prenom + '"]');

                if (eleveTrouve.isAbsent())
                {
                    //On clique sur l'élève, il est absent, on le met en présent, on change sa couleur (gris -> blanc)
                    eleveTrouve.setAbsent(false);
                    eleveTrouve.setJustifie(false);
                    eleve.setAttribute("class", "mb-2 p-2 cursor-pointer w-full eleve border-b border-gray-400 rounded-br rounded-bl");

                    tableau.removeChild(elevePresentDansTableau.parentNode);
                    return;
                }
                else
                {
                    //On clique sur l'élève, il est présent, on le met en absent, on change sa couleur (blanc -> gris)
                    eleveTrouve.setAbsent(true);
                    eleve.setAttribute("class", "mb-2 p-2 cursor-pointer w-full eleve selected border-b border-gray-400 rounded-br rounded-bl");

                    var h3 = document.createElement("h3");
                    h3.innerText = eleveTrouve.nom + " " + eleveTrouve.prenom;
                    h3.setAttribute("data-nom", eleveTrouve.nom);
                    h3.setAttribute("data-prenom", eleveTrouve.prenom);

                    var div = document.createElement("div");
                    div.setAttribute("class", "mb-2 p-2 cursor-pointer w-full eleveAbsent border-b border-gray-400 rounded-br rounded-bl");
                    div.setAttribute("data-id", eleveTrouve.nom + " " + eleveTrouve.prenom);

                    div.appendChild(h3);
                    tableau.appendChild(div);

                    var elevesAbs = document.querySelectorAll('.eleveAbsent');
                    return
                }
            });
        });
// Gestion des évènements lié au deuxième tableau (délégation d'événements)
        tableau.addEventListener('click', function(event) {
            var target = event.target;
            if ( target.classList.contains('eleveAbsent')|| target.tagName === 'H3') {

                var eleveTrouve;

                if (target.tagName === 'H3') {
                    // Si l'élément cliqué est le h3, trouvez le parent avec la classe "eleveAbsent"
                    target = target.closest('.eleveAbsent');

                }

                eleveTrouve = listeEleve.find(function(eleveDeLaListe) {
                    return eleveDeLaListe.nom + " " + eleveDeLaListe.prenom === target.getAttribute("data-id");
                });

                    if (eleveTrouve.isJustifie()) {
                    //On clique sur l'élève, il est justifié, on le met en non justifié, on change sa couleur (gris -> blanc)
                    eleveTrouve.setJustifie(false);
                    target.setAttribute("class", "mb-2 p-2 cursor-pointer w-full eleveAbsent border-b border-gray-400 rounded-br rounded-bl");
                    console.log(eleveTrouve.nom + " " + eleveTrouve.prenom + " n'est pas justifié");
                } else {
                    //On clique sur l'élève, il est non justifié, on le met en justifié, on change sa couleur (blanc -> gris)
                    eleveTrouve.setJustifie(true);
                    target.setAttribute("class", "mb-2 p-2 cursor-pointer w-full eleveAbsent selected border-b border-gray-400 rounded-br rounded-bl");
                    console.log(eleveTrouve.nom + " " + eleveTrouve.prenom + " est justifié");
                }
            }
        });
    });

document.getElementById('btnEnvoyer').addEventListener('click', function() {

    // Récupérez tous les éléments avec la classe "eleveAbsent"
    listeAbsent = [];
    listeAbsentJustifie = [];
    listeEleve.forEach(function (eleveDeLaListe) {
        if (eleveDeLaListe.isAbsent() && !eleveDeLaListe.isJustifie()) {
            listeAbsent.push(eleveDeLaListe.getId());
        }
        if (eleveDeLaListe.isJustifie()) {
            listeAbsentJustifie.push(eleveDeLaListe.getId());
        }
    });

    var donnees = {
        etudiants_absents: listeAbsent,
        etudiants_absents_justifies: listeAbsentJustifie,
        devoir: <?php echo json_encode($lastId[0]); ?>
    };
    document.getElementById('donnees_js').value = JSON.stringify(donnees);;

    document.getElementById('formAbsence').submit();
});
</script>
<style>
    .selected {
        background-color: #adbfcf;
        color: white;
    }
</style>


