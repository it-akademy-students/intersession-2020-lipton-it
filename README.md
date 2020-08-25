# Intersession 2020 - Groupe Lipton IT

<p align="center"> 
![Laravel Prod](https://github.com/it-akademy-students/intersession-2020-lipton-it/workflows/Laravel%20Prod/badge.svg?branch=master)
</p>

## Mise en place du projet

### Mise en place avec Docker

- `docker-compose build app`
- `docker-compose up -d`
- `docker-compose exec app composer install`
- `docker-compose exec nodejs npm install`
- `docker run -it --rm -e "TERM=xterm-256color" -v $(pwd):/usr/src/app -w /usr/src/app node:lts-alpine npm run dev`

### Mise en place sans Docker

- `npm install`
- `npm run dev`
