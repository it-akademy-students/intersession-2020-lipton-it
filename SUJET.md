[![Work in Repl.it](https://classroom.github.com/assets/work-in-replit-14baed9a392b3a25080506f3b7b6d57f295ec2978f6f33ec97e36a161684cbe9.svg)](https://classroom.github.com/online_ide?assignment_repo_id=274952&assignment_repo_type=GroupAssignmentRepo)
<a href="https://www.it-akademy.fr/">
    <img src="https://www.it-akademy.fr/img/logo.png" alt="IT-Akademy logo" title="IT-Akademy" align="right" height="60" />
</a>

# SUJET DU HACKATHON T27
## "Open Source Security Scanner for web apps"

![Version flag](https://img.shields.io/badge/Version-2.0.0-green?style=flat-square)
![Date flag](https://img.shields.io/badge/Date-27%2F07%2F2020-blue?style=flat-square)
![Diff flag](https://img.shields.io/badge/Diffusion-restreinte-red?style=flat-square)

## Contexte de la séquence pédagogique

À l’IT-Akademy, nous sommes convaincus que l’expérience  est un moteur essentiel du progrès. C’est dans ce sens que ce challenge a été pensé, afin de soutenir et promouvoir, auprès de nos étudiants, le goût de l’innovation technique et la philosophie Open Source.

Ainsi, nous vous proposons 3 semaines de production intensive qui vous pemettront de démontrer votre créativité, votre technicité et votre esprit d’équipe !

Vos développements seront présentés devant un jury en fin d’épreuve.

La meilleure app fonctionnelle sera hébergée, mise en production et ouverte aux contributions sous license Open Source. Les autres équipes pourront alors participer à son développement et son évolution.

### COVID-19
**Ce type d'évènement est normalement organisé dans nos locaux et les membres des différentes équipe travaillent ensemble physiquement. Le contexte actuel COVID et les restricitions appliquées nous imposent le télétravail, ce qui rajoute une difficulté mais offre également l'opportunité d'une expérience valorisable dans la mesure où le télétravail tend à se généraliser.**

## Participants

Apprenants et stagiaires des session DFS, CDPI et ESD.

## Thème du projet

La cybersécurité semble (enfin) être devenue une préoccupation centrale pour les acteurs de l’IT au sens le plus large. Toutefois, le retard important qui a été pris dans ce domaine reste difficile à combler. 

Dans la production logicielle, par exemple, peu de développeurs sont formés aux bonnes pratiques de sécurité. Ce challenge propose de réaliser une solution logicielle qui viendra en aide aux développeurs PHP en leur proposant une analyse automatique de leurs projets à la recherche d’éventuelles failles et erreurs de conception / développement.

## L’application

La sécurité des développements est un sujet complexe. Il est difficile d’imaginer que le logiciel puisse un jour totalement remplacer l’esprit humain dans ce domaine. Toutefois, de nombreux outils permettent d’analyser un code à la recherche d’erreurs courantes et constituent une aide précieuse (https://github.com/exakat/php-static-analysis-tools). L’application que nous vous proposons de développer dans ce challenge consiste à tirer le meilleur profit de ces nombreux outils et d’offrir une app à la fois complète et *user friendly*.

Le principe est simple : un utilisateur indique l’adresse du dépôt GitHub (public) de son projet écrit en PHP dans un champ de formulaire et l’application génère un rapport après avoir analysé le code de ce projet.

Si le principe est simple, l’implémentation reste complexe et demande une architecture et une infrastructure bien conçues. C’est tout l’objet de ce défi. Parmi les différents besoins et contraintes technologiques que vous identifierez, nous faisons le choix d’imposer certains mécanismes et briques technologiques : 

    - Un front développé avec Vue 
    - Un backend en PHP de type API développé avec Laravel
    - Un traitement asynchrone des jobs d’analyse (Queues)
    - L’envoi d’e-mails transactionnels pour informer l’utilisateur des étapes de traitement de son projet
    - La possibilité de recueillir des dons pour financer le projet

Outre les fonctionnalités de base énoncées ci-dessus, toutes les améliorations fonctionnelles seront les bienvenues (compte utilisateur avec historique des rapports, stats s’utilisation du service pour les admins, ...). À vous d’être force de proposition.

Les moyens techniques mis à votre disposition sont nombreux et vous trouverez tout ce qui est nécessaire au développement et à la mise en production de votre application dans le [GitHub Student Pack](https://education.github.com/pack/offers) qui vous est offert.

## Constitution des équipes

Chaque équipe est constituée de 5 développeurs (4 en cas d'absence d'un ou plusieurs développeurs) et composée d'un mix des deux session DFS16 et DFS17.
2 étudiants de la session ESD sont présents en début de challenge (jeudi et vendredi de la première semaine) et sont à la disposition des équipes pour fournir des conseils sur les sujets liés à la sécurité (valider les idées, ...). Ils seront également présent en fin de challenge pour évaluer le travail. 2 étudiants CDPI seront présents également en début et en fin de projet afin de conseiller les équipes pour la gestion du temps et la répartition des tâches ainsi que pour l'évaluation. Chaque équipe peut faire appel aux services des ESD et CDPI comme bon lui semble.

## Dépôt et outils

Les équipes constituées disposeront d'un repo GitHub classroom d'équipe. Il est impératif d'indiquer le nom des membres de l'équipe dans le fichier 'TEAM.md', prévu à cet effet.

L'URL du projet en production devra figurer dans le fichier README du dépot.

Vous veillerez également à créer les fichiers de base d'un projet Open Source (README, CONTRIBUTING, SECURITY, ...).

Nous vous incitons enfin à utiliser les fonctionnalités de gestion de projet fournies par GitHub (KanBan) ainsi que les *Issues* et les *Pull Requests*. Cet aspect sera pris en compte par le jury pour le critère "Gestion de projet".



Bon challenge ! Code with love :heart: !
