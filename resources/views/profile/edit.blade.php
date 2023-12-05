<x-app-layout>
   
        <div class="container">
          <div class="row">
            <div class="col-md ">
              <div class="mb-3">
                @include('profile.partials.update-profile-information-form') 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md"> 
              <div class=" mb-3">
                @include('profile.partials.update-password-form')
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-md">
            <div class="mb-5">
              @include('profile.partials.delete-user-form')    
            </div>  
          </div>
        </div>
        </div>
      
</x-app-layout>
