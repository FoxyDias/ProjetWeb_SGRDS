 <div class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-4">

        <h1 class="text-2xl text-gray-800 font-bold mb-4">Liste de rattrapage</h1>

        <div class="bg-white shadow-md rounded p-4">

            <?php if (!empty($rattrapages)) : ?>

                <table class="w-full table-auto">

                    <tbody>

                    <!-- You can use PHP to loop through your database results and generate table rows -->

                    <?php foreach ($rattrapages as $rattrapage) : ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo date('d/m/y', strtotime($rattrapage['daterat'])); ?></td>
                            <td class="border px-4 py-2"><?php echo $rattrapage['salleRat']; ?></td>
                            <td class="border px-4 py-2"><?php echo $rattrapage['typeRat']; ?></td>
                            <td class="border px-4 py-2"><?php echo $rattrapage['dureeRat']; ?></td>
                            <td class="border px-4 py-2"><?php echo $rattrapage['iddevoir']; ?></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    <?php endforeach; ?>

                    <!-- More rows here -->

                    </tbody>

                </table>

            <?php else : ?>
                    <p>Aucun rattrapage n'a été trouvé.</p>
            <?php endif ?>
        </div>

    </div>
 </div>