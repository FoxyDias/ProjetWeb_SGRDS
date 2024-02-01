<div class="flex w-1/5 ml-5 cursor-pointer">
    <img src="<?= base_url('/images/fleche_retour.png'); ?>" alt="retour" class="w-1/5" onclick="customConfirm()">
</div>
<div id="custom-alert" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 border border-6 border-gray-600 rounded-[18px]  shadow-md z-50 hidden">
    <p>Voulez-vous vraiment annuler l'ajout du DS ? </br>
        Les informations saisies seront perdues. </p>
    <div class="mt-4 text-right">
        <button class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-400" onclick="cancelAction()">Annuler</button>
        <button class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-400" onclick="confirmAction()">Confirmer</button>
    </div>
</div>
<div class="mx-auto flex justify-center border border-gray-600 rounded-[18px] border-4 text-2xl " style="width: 850px ; height: 300px;" >
    <div class="flex flex-col w-full justify-between items-center">
        <div class="flex">
            <h1> Vérification des informations</h1>
        </div>
        <div class="flex w-auto">
            <p>
                    Semestre <?= $dataForm['numSemestre']['semres']; ?> - <?= $dataForm['nomRessource']['nomres']; ?>
            </p>
        </div>
        <div class="flex">
            <p>
                <?php     $timestampRat = strtotime($dataForm['datedevoir']);
                setlocale(LC_TIME, 'fr_FR.utf8');
                date_default_timezone_set('Europe/Paris');
                $formattedDateDevoir = strftime('Le %A %d %B %Y', $timestampRat);
                ?>
                <?= $formattedDateDevoir; ?> - DS <?= $dataForm['typedevoir']; ?> - <?= $dataForm['dureedevoir']; ?>
            </p>
        </div>
        <div class="flex">
            <p>
                <?= $dataForm['nomPrenomEnseignant']['prenomens']; ?> <?= $dataForm['nomPrenomEnseignant']['nomens']; ?>
            </p>
        </div>
        <form action="<?= site_url('confirmerInfosDs'); ?>" method="post">
            <!-- Ajoutez un champ de formulaire caché pour stocker le tableau en tant que chaîne JSON -->
            <input type="hidden" name="dataForm" value="<?= htmlspecialchars(json_encode($dataForm)); ?>">

            <div class="flex">
                <button type="submit" class="border border-gray-600 rounded-[18px] mb-3 p-2 text-2xl bg-[#9d9897] hover:bg-gray-400 text-white">
                    Confirmer les informations
                </button>
            </div>
        </form>


    </div>
</div>

<script>
    function customConfirm() {
        document.getElementById('custom-alert').style.display = 'block';
    }

    function cancelAction() {
        document.getElementById('custom-alert').style.display = 'none';
    }

    function confirmAction() {
        window.history.back();

    }
</script>