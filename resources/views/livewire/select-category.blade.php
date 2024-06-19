<select class="cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full"
        wire:model="$parent.subcategory_id" id="category" {{ $attribute }}>

    <option disabled selected value="0">{{ $placeholder }}</option>

    @foreach($categories as $category)
        <optgroup wire:key="{{ $category->id }}" class="text-indigo-500" label="{{ ucwords($category->name) }}">

            @foreach($category->subcategory as $subcategory)
                <option wire:key="{{ $subcategory->id }}" class="text-black" value="{{ $subcategory->id }}">{{ ucwords($subcategory->name) }}</option>
            @endforeach

        </optgroup>
    @endforeach
</select>
