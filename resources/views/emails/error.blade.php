@component('mail::message')
<style>
    body > table.wrapper > tbody > tr > td > table.content > tbody > tr:nth-child(1) > td.header {
        visibility: hidden;
    }
</style>

# Houston, we have a problem...

<p style="text-align:center;"><img src="{{ asset('images/lipton-it.png') }}"></p>

Hey !

Nous sommes désolé de vous dire que nous avons un problème de poids et c'est celui de votre repo.
Pour des raisons de sécurité et de fiabilité de notre service nous n'acceptons pas les répertoires de plus de 100 Mo.

Merci de votre compréhension et de votre confiance,<br>
{{ config('app.name') }}
@endcomponent
