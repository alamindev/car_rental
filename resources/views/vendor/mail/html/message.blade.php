@component('mail::layout') {{-- Header --}} @slot('header') @component('mail::header', ['url' => config('app.url')]) Dawn
Car Rental @endcomponent @endslot {{-- Body --}} {{ $slot }} {{-- Subcopy --}} @isset($subcopy) @slot('subcopy') @component('mail::subcopy')
{{ $subcopy }} @endcomponent @endslot @endisset {{-- Footer --}} @slot('footer') @component('mail::footer') &copy; {{ date('Y')
}} Dawn Car. All rights reserved. @endcomponent @endslot @endcomponent