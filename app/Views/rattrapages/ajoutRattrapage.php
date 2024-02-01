<div class="container mx-auto p-4">
    <h1 class="text-2xl text-gray-800 font-bold mb-4">Prévoir le rattrapage</h1>
         <div class="bg-gray-100 font-sans shadow-md rounded-[12px] border-gray-500 border-2 p-4  overflox-y-auto">

            <div class="mb-2 p-2 flex justify-center rounded">
                   <div class="flex justify-start mb-2">
                       <label class="mr-4">
                           <input type="checkbox" id="nonRattrapage" value="nonRattrapage"> Non-rattrapage
                       </label>
                   </div>
               </div>


                   <!-- Le formulaire préconstruit initialement caché -->
                   <div class="h-full">
                       <form id="prebuiltForm" class="text-center h-1/2">

                           <div class="flex justify-center">
                               <div class="flex flex-col w-1/2">
                                   <div class="mb-2 p-2 rounded text-right">
                                       <label for="date">Date du DS de rattrapage :</label>
                                   </div>
                                   <div class="mb-2 p-2 rounded text-right">
                                      <label for="horaire-début">Horaire début :</label>
                                   </div>
                                    <div class="mb-2 p-2 rounded text-right">
                                       <label for="duree">Durée :</label>
                                   </div>
                                   <div class="mb-2 p-2 rounded text-right">
                                       <label>Type :</label>
                                   </div>
                                   <div class="mb-2 p-2 rounded text-right">
                                       <label for="salle">Salle :</label>
                                   </div>
                                   <div class="mb-2 p-2 rounded text-right">
                                      <label for="commentaire">Commentaire :</label>
                                  </div>
                               </div>



                               <div class="flex flex-col w-3/4">
                                   <div class="mb-2 p-2 rounded">
                                       <input type="date" id="date" name="date">
                                   </div>
                                   <div class="mb-2 p-2 rounded">
                                      <input type="time" id="time" name="time">
                                  </div>
                                   <div class="mb-2 p-2 rounded">
                                      <select id="duree" name="duree">
                                            <option value="">--Choisir la durée du DS--</option>
                                            <option value="1h">1h</option>
                                            <option value="1h15">1h15</option>
                                            <option value="1h30">1h30</option>
                                            <option value="1h45">1h45</option>
                                            <option value="2h">2h</option>
                                            <option value="2h15">2h15</option>
                                            <option value="2h30">2h30</option>
                                            <option value="2h45">2h45</option>
                                            <option value="3h">3h</option>
                                            <option value="3h15">3h15</option>
                                            <option value="3h30">3h30</option>
                                            <option value="3h45">3h45</option>
                                            <option value="4h">4h</option>
                                      </select>
                                  </div>
                                   <div class="mb-2 p-2 flex justify-center rounded">
                                       <div class="flex justify-start mb-2">
                                           <label class="mr-4">
                                               <input type="radio" id="papier" value="papier"> Papier
                                           </label>
                                           <label>
                                               <input type="radio" id="machine" value="machine"> Machine
                                           </label>
                                       </div>
                                   </div>

                                    <div class="mb-2 p-2 ">
                                        <input type="text" id="salle" name="salle" />
                                    </div>
                                     <div class="mb-2 p-2 rounded">
                                        <textarea name="commentaire" rows="12" cols="35"></textarea>
                                    </div>
                               </div>
                           </div>
                           <div class="flex justify-center">
                               <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Valider</button>
                           </div>
                       </form>
                   </div>
               </div>


             </div>

</div>

<script>

    document.addEventListener("DOMContentLoaded", function() {

        var checkbox = document.queryElementById("nonRattrapage");

        var date = document.queryElementById("date");
        var time = document.queryElementById("time");
        var duree = document.queryElementById("duree");
        var papier = document.queryElementById("papier");
        var machine = document.queryElementById("machine");

        var salle = document.queryElementById("salle");


        checkbox.addEventListener('change', function()
        {
            var isChecked = checkbox.checked;

            salle.disabled = !isChecked;

        });

   });




</script>