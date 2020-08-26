@component('mail::message')
# Confirmation

<p style="text-align:center;"><img src="{{ asset('images/logo-red.png') }}"></p>

Bonjour,

Nous avons bien pris en compte votre demande d'analyse. Vous recevrez un mail d'ici quelques minutes avec l'analyse complète de vos fichiers PHP.

{{--@component('mail::panel')--}}
{{--This is the panel content.--}}
{{--@endcomponent--}}

{{--@component('mail::table')--}}
{{--| Laravel       | Table         | Example  |--}}
{{--| ------------- |:-------------:| --------:|--}}
{{--| Col 2 is      | Centered      | $10      |--}}
{{--| Col 3 is      | Right-Aligned | $20      |--}}
{{--@endcomponent--}}

Merci de votre confiance,<br>
{{ config('app.name') }}
@endcomponent
