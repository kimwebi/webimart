@component('mail::message')
    # Daily Sales Report

    @foreach($soldProducts as $name => $quantity)
        - {{ $name }}: {{ $quantity }} sold<br>
    @endforeach

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
