 <div class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-4">

        <h1 class="text-2xl text-gray-800 font-bold mb-4">Liste de rattrapage</h1>

        <div class="bg-white shadow-md rounded-[12px] border-gray-500 border-2 p-4 overflox-y-auto">

            <?php if (!empty($lstDS)) : ?>

                <?php foreach ($lstDS as $ds) : ?>
                <div class="border border-gray-400 border-collapse border-b-2 border-t-0 border-l-0 border-r-0">
                    <div>
                        <p>Semestre <?= $ds['semRes']; ?> - <?= $ds['nomRes']; ?> </p>
                        <p><?= $ds['dateDS'];?> - DS <?= $ds['typeDS'];?> - <?= $ds['dureeDS'];?></p>
                        <p>Enseignant : <?= $ds['nomEns'];?></p>
                    </div>
                    <div>
                        <p>Etat : <?= $ds['etatRat'];?></p>
                        <p>Date : <?= $ds['dateRat'];?></p>
                    </div>
                    <div>

                    </div>
                </div>
                <?php endforeach; ?>

            <?php else : ?>
                    <p>Aucun rattrapage n'a été trouvé.</p>
            <?php endif ?>
        </div>

    </div>
 </div>