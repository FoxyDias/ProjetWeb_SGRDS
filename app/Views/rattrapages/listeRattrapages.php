 <div class="bg-[#adbfcf] font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-4">

        <h1 class="text-2xl text-gray-800 font-bold mb-4">Liste de rattrapage</h1>

        <?php if (!empty($lstDS)) : ?>
            <div class="flex justify-between items-start p-4 font-bold">
                <p>DS initiaux</p>
                <p class="text-right ml-auto">Rattrapage ou non</p>
            </div>

            <div class="bg-white shadow-md rounded-[12px] border-gray-500 border-2 p-4 overflox-y-auto">

            <?php foreach ($lstDS as $ds) : ?>
                <div class="border border-gray-400 border-collapse border-b-2 border-t-0 border-l-0 border-r-0 flex justify-between items-start p-4">
                    <div>
                        <p>Semestre <?= $ds['semRes']; ?> - <?= $ds['nomRes']; ?> </p>
                        <p><?= $ds['dateDS'];?> - DS <?= $ds['typeDS'];?> - <?= $ds['dureeDS'];?></p>
                        <p><?= $ds['prenomEns'];?> <?= $ds['nomEns'];?></p>
                    </div>

                    <div class="text-right ml-auto">
                        <?php
                        $etat = $ds['etatRat'];
                        $couleur = '';

                        // Déterminer la couleur en fonction de l'état
                        switch ($etat) {
                            case 'Programmé':
                                $couleur = 'text-[#00ff00]';
                                break;
                            case 'En attente':
                                $couleur = 'text-[#ff8000]';
                                break;
                            case 'Neutralisé':
                                $couleur = 'text-[#ff0000]';
                                break;
                            // Ajoutez d'autres cas au besoin
                            default:
                                $couleur = 'text-[#000000]';
                                break;
                        }
                        ?>

                        <p class ="<?= $couleur; ?>"><?= $etat; ?></p>
                        <p><?= $ds['dateRat'];?></p>
                        <!-- Si nous sommes admins -->
                        <?php if (session()->get('estAdmin')) : ?>
                            <!-- Si l'état est "En attente" -->
                            <?php if ($ds['etatRat'] == 'En attente') : ?>
                                <div class="">
                                    <a href="<?= site_url('ajoutrattrapage/' . $ds['idDS']);?>" class="underline">Prévoir le rattrapage</a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>


        <?php else : ?>
                <p>Aucun rattrapage n'a été trouvé.</p>
        <?php endif ?>
    </div>

    </div>
 </div>