<div>

   <?php include('vars.php') ?>
	
	<div id="messaging">
		<?php include('messaging/index.php') ?>
	</div>

    
   <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200"></div>
        </div>
      </div>
   <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

      <h2 class="text-2xl font-semibold font-display text-gray-900 sm:text-3xl mb-5">
         Please take a moment to review the information below to ensure we have your latest contact details.
      </h2>
    
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
              <p class="mt-1 text-sm text-gray-600">
                Use a permanent address where you can receive mail.
              </p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
               <div class="px-4 py-5 bg-white sm:p-6">
               <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                  
                     <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                     <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
   
                  <div class="col-span-6 sm:col-span-3">
                     <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                     <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
   
                  <div class="col-span-6 sm:col-span-4">
                     <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                     <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

               </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200"></div>
        </div>
      </div>
    
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Subscriptions</h3>
              <p class="mt-1 text-sm text-gray-600">
                Decide which communications you'd like to receive and how.
              </p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
               <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
               <fieldset id="subscriptions">
                  <legend class="text-base font-medium text-gray-900">Email Subscriptions</legend>
                  <div class="mt-4 space-y-4">
                     <div class="flex items-start">
                     <div class="flex items-center h-5">
                        <input id="subscriptions_Newsletter" value="Newsletter" name="newsletter" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                     </div>
                     <div class="ml-3 text-sm">
                        <label for="newsletter" class="font-medium text-gray-700">Newsletter</label>
                        <p class="text-gray-500">Get newletter sent to you.</p>
                     </div>
                     </div>
                     <div class="flex items-start">
                     <div class="flex items-center h-5">
                        <input id="subscriptions_Daily-Question" value="Daily Question" name="daily-question" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                     </div>
                     <div class="ml-3 text-sm">
                        <label for="daily-question" class="font-medium text-gray-700">Daily Question</label>
                        <p class="text-gray-500">Get sent a question everyday.</p>
                     </div>
                     </div>
                     <div class="flex items-start">
                     <div class="flex items-center h-5">
                        <input id="subscriptions_Spam" value="Spam" name="spam" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                     </div>
                     <div class="ml-3 text-sm">
                        <label for="spam" class="font-medium text-gray-700">Spam</label>
                        <p class="text-gray-500">Get sent Spam!</p>
                     </div>
                     </div>
                  </div>
               </fieldset>
               </div>
               <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
               <button id="optout" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Optout
               </button>
               <button id="saveChanges" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
               </button>
               </div>
            </div>
          </div>
        </div>
      </div>

   </div>

</div>