<div class="flex w-1/5 ml-5 mt-5 ">
    <img src="<?= base_url('/images/fleche_retour.png'); ?>" alt="retour" class="w-1/5 cursor-pointer" onclick="window.history.back()">
</div>
<div class="container mx-auto p-4 flex flex-col items-center">

    <div class="flex justify-center">
        <h1 class="text-2xl text-gray-800 font-bold mb-4">Prévoir le rattrapage</h1>
    </div>

     <div class="bg-gray-100 font-sans shadow-md rounded-[12px] border-gray-500 border-2 p-4 w-[520px] h-[500px]">


         <!-- Le formulaire préconstruit initialement caché -->
         <div class="h-full flex flex-col">
             <?php echo form_open("/ajoutrattrapage/{$iddevoir}/traitement", ['id' => 'prebuiltForm', 'class' => 'text-center h-1/2']); ?>

             <div class="mb-2 p-2 flex justify-center rounded">
                 <div class="flex justify-start mb-2">
                     <label class="mr-4">
                         <?php echo form_checkbox('nonRattrapage', 1, false, 'id="nonRattrapage"'); ?>
                         <span class="ml-2">Pas de rattrapage</span>
                     </label>
                 </div>
             </div>

             <div class="flex justify-center">
                 <div class="flex flex-col w-1/2 ">
                     <div class="mb-4 rounded text-right" style="padding-right: 12px;">
                         <label for="date">Date du DS de rattrapage* :</label>
                     </div>
                     <div class="mb-4 rounded text-right" style="padding-right: 12px;">
                         <label for="horaire-debut">Horaire début* :</label>
                     </div>
                     <div class="mb-4  rounded text-right"style="padding-right: 12px;">
                         <label for="duree">Durée* :</label>
                     </div>
                     <div class="mb-4  rounded text-right"style="padding-right: 12px;">
                         <label>Type* :</label>
                     </div>
                     <div class="mb-4 rounded text-right"style="padding-right: 12px;">
                         <label for="salle">Salle* :</label>
                     </div>
                 </div>

                 <div class="flex flex-col w-1/2">
                     <div class="mb-4 rounded " style="padding-left: 82px;">
                         <?php echo form_input(['name' => 'date', 'id' => 'date', 'class' => 'elementDS disable-on-nonrattrapage', 'type' => 'date', 'required' => 'required']); ?>
                     </div>

                     <div class="mb-4  rounded"style="padding-left: 158px;">
                         <?php echo form_input(['name' => 'time', 'id' => 'time', 'class' => 'elementDS disable-on-nonrattrapage', 'type' => 'time', 'required' => 'required']); ?>
                     </div>

                     <div class="mb-4  rounded">
                         <?php
                         $options = [
                             '' => '--Choisir la durée du DS--',
                             '1h' => '1h',
                             '1h15' => '1h15',
                             '1h30' => '1h30',
                             '1h45' => '1h45',
                             '2h' => '2h',
                             '2h15' => '2h15',
                             '2h30' => '2h30',
                             '2h45' => '2h45',
                             '3h' => '3h',
                             '3h15' => '3h15',
                             '3h30' => '3h30',
                             '3h45' => '3h45',
                             '4h' => '4h',
                         ];
                         echo form_dropdown('duree', $options, '', 'id="duree" class="elementDS disable-on-nonrattrapage" required="required"');
                         ?>
                     </div>

                     <div class="mb-2  flex justify-center rounded">
                         <div class="flex justify-start mb-2">
                             <label class="mr-4">
                                 <?php echo form_radio(['name' => 'type', 'id' => 'papier', 'value' => 'papier', 'class' => 'elementDS disable-on-nonrattrapage', 'required' => 'required']); ?>
                                 Papier
                             </label>
                             <label>
                                 <?php echo form_radio(['name' => 'type', 'id' => 'machine', 'value' => 'machine', 'class' => 'elementDS disable-on-nonrattrapage', 'required' => 'required']); ?>
                                 Machine
                             </label>
                         </div>
                     </div>

                     <div class="mb-2"style="padding-right: 17px;">
                         <?php echo form_input(['name' => 'salle', 'id' => 'salle', 'class' => 'elementDS disable-on-nonrattrapage', 'required' => 'required']); ?>
                     </div>
                </div>
            </div>
             <div class="flex flex-col">
                 <div class="mb-2  rounded text-center">
                     <label for="commentaire">Commentaire :</label>
                 </div>
                 <div class="mb-2  rounded">
                     <?php echo form_textarea(['name' => 'commentaire', 'id' => 'commentaire', 'rows' => '5', 'cols' => '42']); ?>
                 </div>
                 <div class="flex justify-center mt-2">
                     <?php echo form_submit(['class' => 'w-1/3 bg-gray-600 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded '], 'Valider'); ?>
                 </div>
             </div>
             <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var nonRattrapageCheckbox = document.getElementById('nonRattrapage');
        var disableOnNonRattrapageFields = document.querySelectorAll('.disable-on-nonrattrapage');

        function updateFieldsState() {
            disableOnNonRattrapageFields.forEach(function (field) {
                field.disabled = nonRattrapageCheckbox.checked;
                if (nonRattrapageCheckbox.checked) {
                    field.removeAttribute('required');
                } else {
                    field.setAttribute('required', 'required');
                }
            });
        }

        // Initial update based on the initial state of the checkbox
        updateFieldsState();

        // Add event listener to the checkbox
        nonRattrapageCheckbox.addEventListener('change', function () {
            updateFieldsState();
        });
    });
</script>

