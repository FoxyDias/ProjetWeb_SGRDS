<?php

$semestre = 1;
$matiere = "InitInitInitInitI nitInitInitInitInitInitInitInitInitInitIn itInitInitInit";
$date = "26/09/23";
$type = "machine";
$duree = "1h30";
$enseignant = "Philippe LEPIVERT";
$listeEleves = 12;

?>

<div>
    <!--Div contenant la flèche et le rappel des infos entrées auparavant -->
    <div class="w-3/5 flex flex-row justify-between">

        <!--Flèche de retours -->
        <div class="inline-block">
            <a href="./ajoutds" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        </div>

        <!--Rappel des infos -->
        <div class="flex border-8 items-center border-gray-400 rounded-full pl-8 pr-8">

            <!--Semestre et matière -->
            <div class="mr-4">
                <h3 class="text-center w-3/4"> <?php
                    echo "Semestre ".$devoirDB->getSemRessource($dernierDevoir)." - ".$matiere;
                    ?></h3>
            </div>

            <!--Date, type et durée -->
            <div class="flex items-center justify-center">
                <h3 class="text-center"> <?php
                    echo $date." - DS ".$type." - ".$duree;
                    echo "<br>".$enseignant;
                    ?></h3>
            </div>
        </div>
        <br>

    </div>
    <!--Div contenant les deux textes + tableaux associés -->

    </div>
</div>
