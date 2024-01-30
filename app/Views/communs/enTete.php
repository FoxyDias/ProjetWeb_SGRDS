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

<body>
<header class="relative bg-white left-0 p-4">

    <div class="flex justify-between items-center">
        <img src="/img/logoDepInformatique.gif" alt="Département informatique" class="h-9 md:h-16 lg:h-18">


            <?php if (session()->get('estAdmin')): ?>
            <!-- si admin connecté -->
                <div class="flex items-center rounded-[35px] bg-[#989d97] p-2 md:p-4 h-9 md:h-16 lg:h-18 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover:bg-gray-300 duration-300">
                <img src="/img/person-svgrepo-com.png" alt="Département informatique" class="w-10 h-10">
                <span class="text-sm text-gray-800 ml-2"><? echo $nomUtilisateur ?></span>
            <?php else: ?>
            <!-- si mode invité -->
                <a href="./connexion" class="flex items-center rounded-[35px] bg-[#989d97] p-2 md:p-4 h-9 md:h-16 lg:h-18 transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover:bg-gray-300 duration-300">
                    <p class="text-sm text-gray-800 ml-2">Connexion</p>
                </a>

            <?php endif; ?>

        </div>
    </div>

</header>

