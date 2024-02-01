<div class="bg-[#adbfcf]">

    <div class="h-screen flex flex-col items-center justify-center">
        <!-- titre -->
        <div class="flex flex-col items-center">
            <div class="h-full flex">
                <h3 class=" text-6xl font-bold py-2 px-4">
                    Réinitialisation du Mot de Passe
                </h3>
            </div>
        </div>

        <!-- formulaire -->
        <form action="/resetmdp/traitement/<?=$token?>" method="post" accept-charset="utf-8" class="bg-white w-full max-w-sm rounded-[12px] border-gray-500 border-2 shadow-xl py-7 px-4">

            <!-- mot de passe -->
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                        Mot De Passe
                    </label>
                </div>
                <div class="md:w-2/3">
                    <?= form_password('password', set_value('password'), 'class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray required" id="password"') ?>
                </div>
            </div>

            <!-- confirmation mot de passe -->
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                        Confirmer Mot De Passe
                    </label>
                </div>
                <div class="md:w-2/3">
                    <?= form_password('confirm_password', set_value('confirm_password'), 'class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="confirm_password"') ?>
                </div>
            </div>

            <!-- message d'erreur session errorMDP -->
            <?php if (session('errorMDP')) : ?>
                <div class="md:w-2/3 text-center"> <!-- Ajout de la classe text-center -->
                    <p class="text-red-500 text-xs italic"><?php echo session()->getFlashdata('errorMDP') ?></p>
                </div>
            <?php endif ?>

            <!-- bouton connexion -->
            <div class="flex flex-col items-center mx-2">
                <div class="h-full flex">
                    <button class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline-gray focus:outline-none text-white font-bold py-2 px-4 rounded-[18px]" type="submit">
                        Réinitialiser le mot de passe
                    </button>
                </div>
        </form>
    </div>

</div>