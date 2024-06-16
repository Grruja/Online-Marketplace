@props(['image'])

<div x-data="imageUpload">
    <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG up to 5MB</p>
        </div>

        <input wire:model="image" x-on:input="previewImage" x-ref="imageInput" id="image" type="file" class="hidden" />
    </label>

    <template x-if="imageUrl">
        <div class="mt-5 p-5 border bg-gray-100 rounded-md md:w-1/2">
            <div class="relative">
                <div class="flex gap-5">
                    <div class="bg-gray-50 shadow q rounded-md h-24 w-24">
                        <img :src="imageUrl" class="rounded-md object-contain w-full h-full" alt="Users listing image">
                    </div>
                    <div>
                        <p x-text="imageName" class="truncate" style="max-width: 150px"></p>
                        <p x-text="imageSize" class="mt-2 text-gray-500"></p>
                    </div>
                </div>
                <button x-on:click="removeImage" type="button" class="absolute top-0 right-0">
                    <i class="fa-regular fa-circle-xmark text-lg"></i>
                </button>
            </div>
        </div>
    </template>

    @if ($errors->has('image'))
        <em class="text-red-600 text-sm mt-2">{{ $errors->first('image') }}</em>
    @else
        <em x-text="imageError" class="text-red-600 text-sm mt-2"></em>
    @endif
</div>
