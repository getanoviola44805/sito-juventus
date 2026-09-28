# Sito Juventus (non ufficiale)

Progetto per l'esame di Web Programming (Ingegneria Informatica, Università di Catania).
Autore: Gaetano Viola.

Sito dedicato alla Juventus realizzato in **Laravel** con architettura **MVC**:
prossime partite e ultime notizie, rosa con filtro per ruolo, scheda di ogni giocatore,
classifica di Serie A e meteo allo Stadium, registrazione e login, giocatori preferiti.

## Tecnologie

- Laravel 13, PHP 8.3
- MySQL
- HTML, CSS (layout con Flexbox, senza Bootstrap), JavaScript senza framework

## Pagine

| Pagina | URL |
| --- | --- |
| Home | `/` |
| Rosa | `/giocatori` |
| Scheda giocatore | `/giocatori/{giocatore}` |
| Classifica e meteo | `/classifica` |
| Preferiti (utente loggato) | `/preferiti` |
| Registrazione | `/registrazione` |
| Accedi | `/login` |

## API esterne

- **football-data.org**: classifica della Serie A (`/v4/competitions/SA/standings`), con API key nell'header `X-Auth-Token`.
- **Open-Meteo**: meteo attuale allo Stadium, senza chiave.

Le API vengono chiamate dal server; il browser le riceve tramite le route JSON
`/api/classifica` e `/api/meteo`. I preferiti usano `GET /api/preferiti` e
`POST /api/preferiti/{giocatore}`.

## Installazione

```bash
git clone https://github.com/getanoviola44805/sito-juventus.git
cd sito-juventus
composer install
cp .env.example .env
php artisan key:generate
```

Nel file `.env` impostare la connessione MySQL (`DB_CONNECTION=mysql`, `DB_DATABASE=juventus`,
`DB_USERNAME`, `DB_PASSWORD`) e la chiave `FOOTBALL_DATA_KEY`. Poi:

```bash
php artisan migrate:fresh --seed
php artisan serve
```

Il sito è disponibile su `http://127.0.0.1:8000`.
