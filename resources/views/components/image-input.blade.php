@props(['image'])

<label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-100">
    <div wire:loading.remove wire:target="image" class="flex flex-col items-center justify-center pt-5 pb-6">
        @if($image)
            <div class="relative p-3">
                <img src="{{ $image->temporaryUrl() }}" width="200" alt="Users listing image">
                <button x-on:click="$wire.set('image', null)" type="button" class="absolute top-0 right-0 px-3 py-1 rounded-full bg-red-600 text-white">x</button>
            </div>
        @else
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">(PNG or JPG)</p>
        @endif
        @error('image') <em class="text-red-600 text-sm mt-2">{{ $message }}</em> @enderror
    </div>
    <span wire:loading wire:target="image" class="inline-block animate-spin text-inherit size-6 me-1 border-[2px] border-current border-t-transparent rounded-full" role="status" aria-label="loading"></span>

    <input wire:model.blur="image" id="image" type="file" class="hidden" />
</label>
