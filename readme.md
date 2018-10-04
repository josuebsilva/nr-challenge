

## About This Project

This is a simple project. Challenge for extract data of govern site and save on local database.

## How use

1 - first run "composer install" for install or update dependencies

2.1 -

```console
cp .env.example .env
php artisan key:generate
```

2.2 -

Then, create your database with the default user and password:

```sql
CREATE DATABASE IF NOT EXISTS josuebsilva_nrc;
CREATE USER josuebsilva_nrc@localhost IDENTIFIED BY 'Sg2Ju6GLynDc-';
GRANT USAGE ON *.* TO josuebsilva_nrc@localhost IDENTIFIED BY 'Sg2Ju6GLynDc-';
GRANT ALL PRIVILEGES ON josuebsilva_nrc.* TO josuebsilva_nrc@localhost;
```

2.2 - run "php artisan migrate" on terminal for make tables on database

3 - run "php artisan serve" for start the project

4 - go to http://127.0.0.1:8000 in your browser


## Note

This site its using Camara site: http://www2.camara.leg.br/transparencia/licitacoes-e-contratos/editais for extract the data

Thanks!
