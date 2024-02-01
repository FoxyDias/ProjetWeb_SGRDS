<div class="bg-[#adbfcf]">
    <!-- fleche -->
    <div class="absolute md:flex md:items-center mb-6">
        <div class="md:w-2/3">
            <a href="./connexion" >
                <img src="<?= base_url('/images/fleche_retour.png'); ?>"  >
            </a>
        </div>
    </div>

    <div class="h-screen flex flex-col items-center justify-center">
        <!-- titre -->
        <div class="flex flex-col items-center">
            <div class="h-full flex">
                <h3 class=" text-6xl font-bold py-2 px-4">
                    Mot de Passe Oublié
                </h3>
            </div>
        </div>

        <!-- formulaire -->
        <form action="./mdpoublie/traitement" method="post" accept-charset="utf-8" class="bg-white w-full max-w-sm rounded-[12px] border-gray-500 border-2 shadow-xl py-7 px-4">

            <!-- email -->
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <?= form_input('email', set_value('email'), 'class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email"') ?>
                </div>
            </div>

            <!-- message d'erreur session errorEmail -->
            <?php if (session('errorEmail')) : ?>
                <div class="md:w-2/3 text-center"> <!-- Ajout de la classe text-center -->
                    <p class="text-red-500 text-xs italic"><?php echo session()->getFlashdata('errorEmail') ?></p>
                </div>
            <?php endif ?>

            <!-- bouton connexion -->
            <div class="flex flex-col items-center mx-2">
                <div class="h-full flex">
                    <button class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline-gray focus:outline-none text-white font-bold py-2 px-4 rounded-[18px]" type="submit">
                        Envoyer le lien
                    </button>
                </div>
        </form>
    </div>

</div>