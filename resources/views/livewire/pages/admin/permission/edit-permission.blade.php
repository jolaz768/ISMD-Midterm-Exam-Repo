<div>
    {{-- Be like water. --}}
    <div class="bg-card border border-card-line rounded-xl shadow-2xs col-span-full mx-auto mt-30  max-w-4xl">
  <!-- Sign In -->
  <div class="p-4 sm:p-7">
    <div class="text-center">
      <h3 id="hs-modal-signin-label" class="block text-2xl font-bold text-foreground">Create Permission</h3>

    </div>

      <!-- Form -->
      <form wire:submit.prevent="save">
        <div class="grid gap-y-4">
          <!-- Form Group -->
          <div>
            <label for="name" class="block text-sm mb-2 text-foreground">Permission Name</label>
            <div class="relative">
              <input wire:model.defer="name" type="text" id="name" name="name" class="py-2.5 sm:py-3 px-4 block w-full bg-gray-200
               border-layer-line rounded-lg sm:text-sm text-foreground dark:text-black  not-even:placeholder:text-muted-foreground focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" required aria-describedby="name-error">
              <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>
            </div>
            @error('name')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
            @enderror
          </div>
          <!-- End Form Group -->

          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">Submit</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>
  <!-- End Sign In -->
</div>
</div>
