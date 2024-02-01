<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="/output.css">
</head>

<body class="flex flex-col min-h-screen">
<header class="relative bg-white left-0 p-4">

    <div class="flex justify-between items-center">
        <img src="/img/logoDepInformatique.gif" alt="Département informatique" class="h-9 md:h-16 lg:h-18">

            <?php if (session()->get('estProf')): ?>
                <a href="/deconnexion" class="flex items-center rounded-[35px] bg-[#989d97] p-2 md:p-4 h-9 md:h-16 lg:h-18 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover:bg-gray-300 duration-300 relative group">
                    <img src="/img/person-svgrepo-com.png" alt="Département informatique" class="w-10 h-10">
                    <div class="ml-5">
                        <span class="group-hover:opacity-0 ease-in-out duration-100">
                            <?= session('nomUtilisateur') . " " . session('prenomUtilisateur') ?>
                        </span>
                        <span class="absolute opacity-0 top-[35%] left-[35%] transition ease duration-300 delay-50 group-hover:opacity-100">
                            Déconnexion
                        </span>
                    </div>
                </a>


            <?php else: ?>
            <!-- si mode invité -->
                <a href="./connexion" class="flex items-center rounded-[35px] bg-[#989d97] p-2 md:p-4 h-9 md:h-16 lg:h-18 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover:bg-gray-300 duration-300">
                    <p class="text-sm text-gray-800 ml-2">Connexion</p>
                </a>
            <?php endif; ?>

        </a>
    </div>
</header>
<nav>
    <ul class="flex justify-center items-center bg-[#989d97] p-2 md:p-4">
        <li class="mr-6">
            <a href=" <?= base_url('./listerattrapages') ?> " class="text-sm text-gray-800 hover:text-gray-600 transition duration-300 transform hover:scale-105 p-2 md:p-4 bg-gray-300 hover:bg-gray-400 rounded-md">Liste des Devoirs</a>
        </li>
        <?php if (session()->get('estAdmin')): ?>
            <li class="mr-6">
                <a href="<?= base_url('./ajoutds') ?>" class="text-sm text-gray-800 hover:text-gray-600 transition duration-300 transform hover:scale-105 p-2 md:p-4 bg-gray-300 hover:bg-gray-400 rounded-md">Ajouter un devoir</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<main class="flex-1">
    <!-- Contenu principal de la page va ici -->


