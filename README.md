<p align="center"><a href="http://vps02.r159.dk/CompanyAdvertisement/public" target="_blank"><img src="http://vps02.r159.dk/CompanyAdvertisement/public/images/front.png" width="400"></a></p>

## Om dette projekt

Dette er et SOP projekt lavet af Markus Smith Nielsen. Projektet er udviklet med [Laravel v8.65](https://laravel.com/). Systemet har til formål at hjælpe nyopstartet virksomheder med at nå deres målgruppe.
Projektet er tager udgangspunkt i Start Bootstraps tema [SB-Admin 2](https://startbootstrap.com/theme/sb-admin-2).

Systemets funktioner består af følgende funktioner:

- [Login system vh.a. Laravels indbygget authentication system](https://laravel.com/docs/8.x/authentication)
- [Rolle system (Administrator & Bruger).](https://github.com/spatie/laravel-permission)
- Filter system.
- Opret, rediger og slet reklame.
- Søgning på reklame eller filter.
- Opret, rediger og slet kontaktpersoner (kun tilgængelig for Administrator).
- Opret, rediger og slet rolle (kun tilgængelig for Administrator).

## Opsætning af systemet

For at benytte sig af dette system skal miljøet som projektet skal køre på opfylde [Laravels server krav](https://laravel.com/docs/8.x/deployment#server-requirements).

- **PHP >= 7.3**
- **BCMath PHP Extension**
- **Ctype PHP Extension**
- **Fileinfo PHP Extension**
- **JSON PHP Extension**
- **Mbstring PHP Extension**
- **OpenSSL PHP Extension**
- **PDO PHP Extension**
- **Tokenizer PHP Extension**
- **XML PHP Extension**

Derefter skal man køre følgende kommandoer i projektmappen via en kommandoprompt.

- `php -r "file_exists('.env') || copy('.env.example', '.env');"`
- `composer install -q --no-dev --no-ansi --no-interaction --no-scripts --no-suggest --no-progress --prefer-dist`
- `composer dump-autoload`
- `npm install`
- `chmod -R 775 storage bootstrap/cache`
- `php artisan migrate`
- `php artisan optimize:clear`
- `npm run dev`

Dernæst udfyld de nødvendige informationer i filen `.env` i projektmappen.

Efter opsætning skal man oprette tilladelser og en admin bruger. Dette gør man via følgende kommandoer.
- `php artisan db:seed --class=PermissionTableSeeder`
- `php artisan db:seed --class=CreateSuperAdminUser`

Efter udførelsen af disse kommandoer kan man logge ind med følgende informationer.

Email: `admin@admin.dk`

Password: `123456`

Til slut kan man køre kommandoen `php artisan serve`. For at få siden vist skal du tilgå `localhost:8000`.

En demo af projektet findes via dette [link](http://vps02.r159.dk/CompanyAdvertisement/public/)

### Login informationer:

#### Normal Bruger:
Email: `bruger@bruger.dk` 
Password: `123456`

#### Administrator:
Email: `admin@admin.dk` 
Password: `123456`