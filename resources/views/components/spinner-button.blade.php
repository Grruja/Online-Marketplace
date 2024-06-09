<div>
    <span wire:loading.remove>{{ $slot }}</span>
    <div wire:loading>
        <span class="inline-block animate-spin text-inherit size-3 me-1 border-[2px] border-current border-t-transparent rounded-full" role="status" aria-label="loading"></span>
        <span>{{ $slot }}</span>
    </div>
</div>
