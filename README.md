
# Fitness activities tracker

Small Laravel web project to manage the database of musical
records from a discography firm. Features:
 
- CRUD of artists.
- CRUD of LPs.
- Songs addition/edit asociated to LP.
- Authors addition/edit related to songs.

## Models

- Artist.
- LP.
- Song.
- Author.

## PHPUnit tests

Included 25 tests with 51 assertions of unit/feature tests.

## How to install project

1. ) Clone GitHub project and access to directory.
2. ) Install depedences writing: `compose install`
3. ) Copy ***.env.example*** file to ***.env*** and configure database credentials.
4. ) Generate encryption key executing commands: `php artisan key:generate`
5. ) Execute migration of database with seeds: `php artisan migrate:fresh --seed`
6. ) Activate server: `php artisan serve`
11. ) Load project in http://127.0.0.1:8000

## Screenshots

Main page displaying lastes LP's and artists:

<img src=SCREENSHOTS/01.png width=600>

Artists listing page:

<img src=SCREENSHOTS/02.png width=600>

LP's listing page:

<img src=SCREENSHOTS/03.png width=600>

LP details page:

<img src=SCREENSHOTS/04.png width=600>

LP edition page:

<img src=SCREENSHOTS/05.png width=600>