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

                        <?php
                        $timestamp = strtotime($ds['dateDS']);
                        setlocale(LC_TIME, 'fr_FR.utf8');
                        date_default_timezone_set('Europe/Paris');
                        $formattedDate = strftime('Le %d %B %Y', $timestamp);

                        // Afficher le résultat
                        echo "<p>{$formattedDate} - DS {$ds['typeDS']} - {$ds['dureeDS']}</p>";
                        ?>

                        <p><?= $ds['prenomEns'];?> <?= $ds['nomEns'];?></p>
                        <!-- Si l'état est "En attente" -->
                        <?php if ($ds['etatRat'] == 'En attente') : ?>
                            <!-- Si nous sommes admins -->
                            <?php if (session()->get('estAdmin')) : ?>
                                <div class="">
                                    <a href="<?= site_url('ajout_etudiants_absents/'.$ds['idDS']);?>" class="underline">Gérer les absences</a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
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

                        <!-- Si l'état est "En attente" -->
                        <?php if ($ds['etatRat'] == 'En attente') : ?>
                            <!-- Si nous sommes admins -->
                            <?php if (session()->get('estAdmin')) : ?>
                                <div class="">
                                    <a href="<?= site_url('ajoutrattrapage/' . $ds['idDS']);?>" class="underline">Prévoir le rattrapage</a>
                                </div>
                            <?php endif; ?>
                        <?php elseif ( $ds['etatRat'] == 'Programmé' ) : ?>
                            <?php
                            // Supposons que $ds['dateRat'] soit une chaîne de caractères représentant une date
                            $timestampRat = strtotime($ds['dateRat']);
                            setlocale(LC_TIME, 'fr_FR.utf8');
                            date_default_timezone_set('Europe/Paris');
                            $formattedDateRat = strftime('Le %d %B %Y', $timestampRat);

                            // Afficher le résultat
                            echo "<p>{$formattedDateRat} - DS {$ds['typeRat']} - {$ds['dureeRat']} - Salle : {$ds['salleRat']}</p>";
                            ?>
                        <p><?= $ds['commentaireRat'];?></p>
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