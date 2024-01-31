<div class="container mx-auto p-4">

        <h1 class="text-2xl text-gray-800 font-bold mb-4">Prévoir le rattrapage</h1>


       <div class="bg-white shadow-md rounded-[12px] border-gray-500 border-2 p-4 overflox-y-auto">




        <label for="date">Date du DS de rattrapage : </label>




        <label for="time-select"> Durée : </label>

        <select name="time" id="time-select">
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




 <label for="salle">Salle : </label>




 <label for="Commentaire">Commentaire : </label>









       </div>





                   <!-- Le formulaire préconstruit initialement caché -->
                   <div class="h-full">
                       <form id="prebuiltForm" class="text-center h-1/2">
                           <h3 id="nomRessourcePlaceholder"></h3>

                           <div class="flex justify-center">
                               <div class="flex flex-col w-1/2">
                                   <div class="mb-2 p-2 rounded text-right">
                                       <label for="date">Date :</label>
                                   </div>
                                   <div class="mb-2 p-2 rounded text-right">
                                       <label>Type :</label>
                                   </div>
                                   <div class="mb-2 p-2 rounded text-right">
                                       <label for="duree">Durée :</label>
                                   </div>
                                   <div class="mb-2 p-2 rounded text-right">
                                       <label for="enseignant">Enseignant concerné :</label>
                                   </div>
                               </div>
                               <div class="flex flex-col w-3/4">
                                   <div class="mb-2 p-2 rounded">
                                       <input type="date" id="date" name="date">
                                   </div>
                                   <div class="mb-2 p-2 flex justify-center rounded">
                                       <div class="flex justify-start mb-2">
                                           <label class="mr-4">
                                               <input type="radio" name="type" value="papier"> Papier
                                           </label>
                                           <label>
                                               <input type="radio" name="type" value="machine"> Machine
                                           </label>
                                       </div>
                                   </div>
                                   <div class="mb-2 rounded">
                                       <select id="duree" name="duree">
                                           <option value="1">1 heure</option>
                                           <option value="2">2 heures</option>
                                           <option value="3">3 heures</option>
                                           <!-- Ajoutez d'autres options selon vos besoins -->
                                       </select>
                                   </div>
                                   <div class="mb-2 p-2 rounded">
                                       <select id="enseignant" name="enseignant">
                                           <option value="1">M. Dupont</option>
                                           <option value="2">Mme. Durand</option>
                                           <option value="3">M. Martin</option>
                                           <!-- Ajoutez d'autres options selon vos besoins -->
                                       </select>
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