@component('mail::message')

    # Thank you for sending your Application

    <strong>Baza.co.ke</strong> {{ $data['name'] }}
    <strong>Email</strong> {{ $data['email'] }}

    <strong>Your bursary has been accepted </strong>

    {{ $data['message'] }}
@endcomponent
