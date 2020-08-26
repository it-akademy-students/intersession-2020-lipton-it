@component('mail::message')
# Bonne nouvelle vos résultats sont là

<p style="text-align:center;"><img src="{{ asset('images/logo-red.png') }}"></p>

Hey !

Vous avez fait une demande d'analyse, bonne nouvelle vous trouverez vos résultats en pièce jointe.
Merci d'avoir utilisé notre solution.

Lipton IT est un service gratuit, pour nous soutenir vous pouvez :
- Prendre 5 minutes et parlez de nous avec vos collègues
- Nous rejoindre sur les réseaux sociaux et nous aider à promouvoir notre solution libre de droit
- Nous soutenir, en nous faisant un don vous nous permettez de nous consacrer entièrement à Lipton IT, de l'améliorer et le faire grandir.

En espérant vous revoir bientôt !

Merci de votre confiance,<br>
{{ config('app.name') }}
@endcomponent
