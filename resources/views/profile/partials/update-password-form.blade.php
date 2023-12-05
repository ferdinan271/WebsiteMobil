{{-- boostrap --}}
<div class="card">
  <div class="card-header">
    Update Password
  </div>
  <div class="card-body">
    <h5 class="card-title">Ensure your account is using a long, random password...</h5>
        <form method="POST" action="{{ route('password.update') }}">
          
          @csrf 
          @method('put')
        
          <div class="mb-3">
            <label for="current_password">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password">
            <div class="text-danger mt-2">
              @error('current_password') 
                {{ $message }} 
              @enderror
            </div>
          </div>
        
          <div class="mb-3">
            <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <div class="text-danger mt-2">  
              @error('password')
                {{ $message }}
              @enderror
            </div>
          </div>
        
          <div class="mb-3">
            <label for="password_confirmation">Confirm Password</label>    
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            <div class="text-danger mt-2">
              @error('password_confirmation')
                {{ $message }}
              @enderror
            </div>
          </div>
        
          <button type="submit" class="btn btn-warning">Save</button>
          
          @if (session('status') === 'password-updated')
            <div class="text-success mt-2" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
              {{ __('Saved.') }}  
            </div>
          @endif
        
        </form>
  </div>
</div>



{{-- Tailwind --}}
{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
