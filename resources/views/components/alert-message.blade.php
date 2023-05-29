@if (session()->has('success'))

<div class="flex flex-row gap-3 item-center dark:bg-white dark:text-black bg-black text-white">

    <x-heroicon-o-check-circle/>
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600 dark:text-gray-400"
    >{{ session('success') }}</p>
</div>

@endif

@if (session()->has('error'))
    <div class="flex flex-row gap-3 item-center dark:bg-white dark:text-black bg-black text-white">

    <x-heroicon-o-exclamation-triangle/>
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600 dark:text-gray-400"
    >{{ session('error') }}</p>

    </div>
    
@endif