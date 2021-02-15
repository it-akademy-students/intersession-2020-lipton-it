[![Work in Repl.it](https://classroom.github.com/assets/work-in-replit-14baed9a392b3a25080506f3b7b6d57f295ec2978f6f33ec97e36a161684cbe9.svg)](https://classroom.github.com/online_ide?assignment_repo_id=274952&assignment_repo_type=GroupAssignmentRepo)
<h1 align="center">
  <a href="https://github.com/it-akademy-students/intersession-2020-lipton-it"><img src="resources/images/banner.png" alt="Lipton-IT" height="320"></a>
  <br>
  Lipton-IT
</h1>
<h4 align="center">The code inspector for PHP.</h2>

<p align="center">
  <a href="https://github.com/it-akademy-students/intersession-2020-lipton-it/workflows/Laravel%20Prod/badge.svg?branch=master"><img src="https://github.com/it-akademy-students/intersession-2020-lipton-it/workflows/Laravel%20Prod/badge.svg?branch=master" alt="Build Status"></a><br>
  <a href="SUJET.md">Sujet</a> | <a href="#outils-utilisés">Outils utilisés</a> | <a href="#mise-en-place-du-projet">Mise en place du projet</a> | <a href="LICENSE">License</a>
</p>

## Sujet

Voir [SUJET](SUJET.md)

## Outils utilisés

- PHP,
- Laravel,
- Vuejs,
- ECS,
- Progpilot,
- Stripe,
- PayPal,
- Mailtrap,
- Docker,
- Figma.

## Mise en place du projet

### Mise en place avec Docker

- `docker-compose build app`
- `docker-compose up -d`
- `cp .env.example .env`
- `docker-compose exec app php artisan key:generate`
- Ajoutez les clés Stripe et les clés du serveur SMTP dans le fichier `.env`
- `docker-compose exec app composer install`
- `docker-compose exec nodejs npm install` or `npm install` if it doesn't work
- `docker-compose exec nodejs npm run dev` or `docker run -it --rm -e "TERM=xterm-256color" -v $(pwd):/usr/src/app -w /usr/src/app node:lts-alpine npm run dev` if it doesn't work

### Mise en place sans Docker

- `git clone https://github.com/it-akademy-students/intersession-2020-lipton-it.git`
- `cd intersession-2020-lipton-it`
- `cp .env.example .env`
- `php artisan key:generate`
- Ajoutez les clés Stripe et les clés du serveur SMTP dans le fichier `.env`
- `composer install`
- `npm install`
- `npm run dev`

<p align="center"><img src="resources/images/jjba.gif" height="320"></p>
