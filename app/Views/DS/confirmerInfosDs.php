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
                <?= $dataForm['datedevoir']; ?> - DS <?= $dataForm['typedevoir']; ?> - <?= $dataForm['dureedevoir']; ?>
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
                <button type="submit" class="border border-gray-600 rounded-[18px] mb-3 p-2 text-2xl bg-[#9d9897] text-white">
                    Confirmer les informations
                </button>
            </div>
        </form>


    </div>
</div>