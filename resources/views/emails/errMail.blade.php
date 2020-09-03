@component('mail::message')
<style>
    body > table.wrapper > tbody > tr > td > table.content > tbody > tr:nth-child(1) > td.header {
        visibility: hidden;
    }
</style>

# Houston, we have a problem...

<p style="text-align:center;"><img src="{{ asset('images/lipton-it.png') }}"></p>

Hey !

Nous avons rencontré un probleme technique.<br>
Merci de bien vouloir essayer de nouveau.<br>
{{ config('app.name') }}
@endcomponent
