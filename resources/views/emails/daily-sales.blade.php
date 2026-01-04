@component('mail::message')
    # Daily Sales Report

    @foreach($soldProducts as $name => $quantity)
        - {{ $name }}: {{ $quantity }} sold
    @endforeach

    Thanks,
    {{ config('app.name') }}
@endcomponent
