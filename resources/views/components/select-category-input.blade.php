<select {{ $attributes->merge(['class' => 'cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full']) }}
    wire:model="category" id="category">

    <option disabled selected value="">{{ $slot }}</option>

    @foreach(config('listing.category') as $category => $subcategories)
        <optgroup class="text-indigo-500" label="{{ ucwords($category) }}">

            @foreach($subcategories as $subcategory)
                <option class="text-black" value="{{ $subcategory }}">{{ ucwords($subcategory) }}</option>
            @endforeach

        </optgroup>
    @endforeach
</select>
