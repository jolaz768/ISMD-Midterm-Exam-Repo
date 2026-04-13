<!-- Table Section -->

<div class="w-full px-4 py-6 sm:px-6 lg:px-8">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="overflow-x-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
      <div class="min-w-full inline-block align-middle">
        <div class="bg-layer border border-layer-line rounded-xl shadow-2xs overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-table-line">
            <div>
              <h2 class="text-xl font-semibold text-foreground">
                Permissions
              </h2>
              <p class="text-sm text-muted-foreground-2">
                Add permissions, edit and more.
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus" href="#">
                  View all
                </a>

                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none" href="{{ route('admin.create.permission') }}">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                  Add Permission
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-table-line">
            <thead class="bg-muted">
              <tr>
                <th scope="col" class="ps-6 py-3 text-start">
                  <label for="hs-at-with-checkboxes-main" class="flex">
                    <input type="checkbox" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-main">
                    <span class="sr-only">Checkbox</span>
                  </label>
                </th>

                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Name
                    </span>
                  </div>
                </th>
                

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Created
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-table-line">
              @foreach ($permissions as $pkey => $permission)
              <tr wire:key="{{ $pkey }}">
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 py-3">
                   
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                    <div class="flex items-center gap-x-3">
                      <div class="grow">
                        <span class="block text-sm font-semibold text-foreground">{{ $permission->name  }}</span>
                        
                      </div>
                    </div>
                  </div>
                </td>
               
                
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-muted-foreground-1">{{ $permission->created_at }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <a class="inline-flex items-center gap-x-1 text-sm text-primary decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="#">
                      Edit
                    </a>
                  </div>
                </td>

                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <button class="text-sm font-medium text-red-600 hover:underline" href="{{ $permission->id }}">
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
                  
              @endforeach

             
            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-layer-line">
            <div>
              <p class="text-sm text-muted-foreground-2">
                <span class="font-semibold text-foreground">12</span> results
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <button type="button" class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                  Prev
                </button>

                <button type="button" class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus">
                  Next
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
              </div>
            </div>
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->