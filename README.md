# simple-laravel5-5-crud
This is laravel 5.5 port of repo https://github.com/scotch-io/simple-laravel-crud

Above laravel project was not working for laravel 5.5. This is an attempt to solve this issue.

You can use code as it is, but for curious below are Steps:

1. Install laravel https://laravel.com/docs/5.5/installation#installing-laravel

2. Install laravel collective package, Refer: https://laravelcollective.com/docs/5.4/html#installation

composer require "laravelcollective/html":"^5.4.0"

Next, add your new provider to the providers array of config/app.php:

  'providers' => [
    // ...
    Collective\Html\HtmlServiceProvider::class,
    // ...
  ],

Finally, add two class aliases to the aliases array of config/app.php:

  'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
    // ...
  ],

3. create a database & populate configuration in config/database.php (comment out entries in .env file if any problem occurs).

4. Create controller, model, migrations for Nerd (-a for --all)

php artisan make:model Nerd -a

5. Now run migrate

php artisan migrate (to create nerd tables in db)

6. Edit controller, model, migrations (database/****create_nerds_table****) as per this project source

7. Copy (resources/views/nerds) folder from this repo into views folder of your project.


It should work fine now......

