# Intersession 2020 - Groupe Lipton IT

<p align="center"><img src="resources/images/lipton-it.png" height="250"></p>

<p align="center">
<a href="https://github.com/it-akademy-students/intersession-2020-lipton-it/workflows/Laravel%20Prod/badge.svg?branch=master"><img src="https://github.com/it-akademy-students/intersession-2020-lipton-it/workflows/Laravel%20Prod/badge.svg?branch=master" alt="Build Status"></a>
</p>

## Mise en place du projet

### Mise en place avec Docker

- `docker-compose build app`
- `docker-compose up -d`
- `docker-compose exec app composer install`
- `docker-compose exec nodejs npm install` or `npm install` if it doesn't work
- `docker-compose exec app php artisan key:generate`
- Write your stripe keys in the end of the .env file and your smtp credentials
- `docker-compose exec nodejs npm run dev` or `docker run -it --rm -e "TERM=xterm-256color" -v $(pwd):/usr/src/app -w /usr/src/app node:lts-alpine npm run dev` if it doesn't work

### Mise en place sans Docker

- `composer install`
- `npm install`
- `npm run dev`
