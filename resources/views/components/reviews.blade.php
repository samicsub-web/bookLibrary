@props(['count'])

<div class="flex items-center">
    @if($count == 0 || is_null($count))
    <x-star/>
    <x-star/>
    <x-star/>
    <x-star/>
    <x-star/>
    

    @elseif($count == 1)
        <x-star :marked="true"/>
        <x-star />
        <x-star />
        <x-star />
        <x-star />
    
    @elseif($count == 2)
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star />
        <x-star />
        <x-star />
    
    @elseif($count == 3)
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star />
        <x-star />
    
    @elseif($count == 4)
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star />
    
    @elseif($count == 5)
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star :marked="true"/>
        <x-star :marked="true"/>

    @else
        <x-star/>
        {{-- <x-star/>
        <x-star/>
        <x-star/>
        <x-star/> --}}
    @endif
</div>
