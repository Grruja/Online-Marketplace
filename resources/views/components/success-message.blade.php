@if(session('success'))
    <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="p-5 rounded-lg bg-green-100 text-center w-fit absolute top-5 left-0 right-0 m-auto">
        <p class="text-green-600">Listing created successfully.</p>
    </div>
@endif
