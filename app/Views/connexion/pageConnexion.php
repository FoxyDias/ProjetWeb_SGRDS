<div class="bg-[#adbfcf]">
<!-- fleche -->
<div class="md:flex md:items-center mb-6">
    <div class="md:w-2/3">
        <a href="#" class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
    </div>
</div>

<div class="h-screen flex flex-col items-center justify-center">
    <!-- titre -->
    <div class="flex flex-col items-center">
        <div class="h-full flex">
            <h3 class=" text-6xl font-bold py-2 px-4">
                Se connecter
            </h3>
        </div>
    </div>

    <!-- formulaire -->
    <form class="bg-white w-full max-w-sm rounded-[12px] border-gray-500 border-4 py-7 px-4">

        <!-- identifiant -->
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="identifiant">
                    Identifiant
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="identifiant" type="text">
            </div>
        </div>
        <!-- mot de passe -->
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                    Mot De Passe
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password">
            </div>
        </div>
        <!-- mdp oublie -->
        <div class="flex flex-col items-center">
            <div class="h-full flex">
            <a class="inline-block text-sm text-gray-500 align-baseline hover:text-gray-800" href="./mdpoublie">
                Mot de passe oublié ?
            </a>
        </div>
        <!-- bouton connexion -->
        <div class="flex flex-col items-center mx-2">
            <div class="h-full flex">
            <button class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline-gray focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                Se connecter
            </button>
        </div>
    </form>
</div>

</div>