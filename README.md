# laravel-bootstrap-ui
How to apply bootstrap template to Laravel project

![Alt text](documentation/images/template-website.png?raw=true "Title")


We will take this in Laravel (default dashboard):

![Alt text](documentation/images/laravel-dashboard-with-loginregister.png?raw=true "Title")

to this (in laravel):

![Alt text](documentation/images/dashboard-of-theme.png?raw=true "Title")



First we install laravel with composer:

> https://laravel.com/docs/9.x/installation#installation-via-composer


```
Creating a "laravel/laravel" project at "./example-app"
Info from https://repo.packagist.org: #StandWithUkraine
Installing laravel/laravel (v9.1.10)
  - Downloading laravel/laravel (v9.1.10)
  - Installing laravel/laravel (v9.1.10): Extracting archive
Created project in /Users/andrewchukwu/DEVProjects/laravel/example-app
> @php -r "file_exists('.env') || copy('.env.example', '.env');"
Loading composer repositories with package information
Updating dependencies
Lock file operations: 108 installs, 0 updates, 0 removals
  - Locking brick/math (0.9.3)
  - Locking dflydev/dot-access-data (v3.0.1)
  - Locking doctrine/inflector (2.0.4)
  - Locking doctrine/instantiator (1.4.1)
  - Locking doctrine/lexer (1.2.3)
```

> php artisan serve

This will start the application on http://localhost:8080

Next, to check the connection to the database before executing a migration. You can check the details in the .env file

In the .env file, update the database credentials:

DB_CONNECTION=mysql
#DB_HOST=localhost
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bootstrap-ui
DB_USERNAME=laravel
DB_PASSWORD=laravel
```
andrewchukwu@Andrews-MacBook-Pro14 laravel-bootstrap-ui % php artisan migrate:status

   Illuminate\Database\QueryException 

  SQLSTATE[HY000] [1045] Access denied for user 'root'@'172.18.0.1' (using password: NO) (SQL: select * from information_schema.tables where table_schema = laravel and table_name = migrations and table_type = 'BASE TABLE')

  at vendor/laravel/framework/src/Illuminate/Database/Connection.php:742
    738▕         // If an exception occurs when attempting to run a query, we'll format the error
    739▕         // message to include the bindings with SQL, which will make this exception a
    740▕         // lot more helpful to the developer instead of just the database's errors.
    741▕         catch (Exception $e) {
  ➜ 742▕             throw new QueryException(
    743▕                 $query, $this->prepareBindings($bindings), $e
    744▕             );
    745▕         }
    746▕     }

andrewchukwu@Andrews-MacBook-Pro14 laravel-bootstrap-ui % php artisan migrate:status  
+------+-------------------------------------------------------+-------+
| Ran? | Migration                                             | Batch |
+------+-------------------------------------------------------+-------+
| No   | 2014_10_12_000000_create_users_table                  |       |
| No   | 2014_10_12_100000_create_password_resets_table        |       |
| No   | 2019_08_19_000000_create_failed_jobs_table            |       |
| No   | 2019_12_14_000001_create_personal_access_tokens_table |       |
+------+-------------------------------------------------------+-------+
andrewchukwu@Andrews-MacBook-Pro14 laravel-bootstrap-ui % 

```

```
andrewchukwu@Andrews-MacBook-Pro14 laravel-bootstrap-ui % php artisan migrate       
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (133.30ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (104.99ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (113.45ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (215.34ms)
andrewchukwu@Andrews-MacBook-Pro14 laravel-bootstrap-ui % php artisan migrate:status
+------+-------------------------------------------------------+-------+
| Ran? | Migration                                             | Batch |
+------+-------------------------------------------------------+-------+
| Yes  | 2014_10_12_000000_create_users_table                  | 1     |
| Yes  | 2014_10_12_100000_create_password_resets_table        | 1     |
| Yes  | 2019_08_19_000000_create_failed_jobs_table            | 1     |
| Yes  | 2019_12_14_000001_create_personal_access_tokens_table | 1     |
+------+-------------------------------------------------------+-------+
```



We will be using this template: https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html

Stored in the git project under theme/template

The .gitignore has ./temp* added to ignore temp files. We will explode the theme template into temp/template so we can work with the files.

> temp/theme/templates

> theme/template - The zip of the template


## Install breeze (Laravel authentication (login/register))

Next we install breeze which is a starter kit for laravel
 https://laravel.com/docs/9.x/starter-kits


> composer require laravel/breeze --dev
>
>php artisan breeze:install
>npm install
>npm run dev

At this point we have a working Laravel applicaton with login and registration.


## Adding bootstrap to Laravel

To add bootstrap to this projecte we can use:

> composer require laravel/ui
>
>  php artisan ui bootstrap --auth	
>
> npm install bootstrap@latest bootstrap-icons @popperjs/core --save-dev

Once done run
>npm run dev

```
andrewchukwu@Andrews-MacBook-Pro14 laravel-bootstrap-ui % npm run dev

> dev
> npm run development


> development
> mix

        Additional dependencies must be installed. This will only take a moment.
 
        Running: npm install resolve-url-loader@^5.0.0 --save-dev --legacy-peer-deps
 
        Finished. Please run Mix again.
 
andrewchukwu@Andrews-MacBook-Pro14 laravel-bootstrap-ui % npm run dev
```

In resources/sass/app.scss, add the following line:

> @import '~bootstrap-icons/font/bootstrap-icons';


# Adding the bootstrap template.

In order to change the template, you need to know how laravel handles templating. 

First, copy all the template files to the public directory.

```
andrewchukwu@Andrews-MacBook-Pro14 theme % pwd; ls -l
/Users/andrewchukwu/DEVProjects/laravel/laravel-bootstrap-ui/public/theme
total 72
-rw-rw-r--@  1 andrewchukwu  staff   999  3 Jun 09:45 CHANGELOG.md
-rw-rw-r--@  1 andrewchukwu  staff   386  3 Jun 09:45 ISSUE_TEMPLATE.md
-rw-rw-r--@  1 andrewchukwu  staff  1069  3 Jun 09:45 LICENSE
-rw-rw-r--@  1 andrewchukwu  staff  8880  3 Jun 09:45 README.md
drwxrwxr-x@  7 andrewchukwu  staff   224  3 Jun 09:45 assets
drwxrwxr-x@  3 andrewchukwu  staff    96  3 Jun 09:45 docs
-rw-rw-r--@  1 andrewchukwu  staff   900  3 Jun 09:45 gulpfile.js
-rw-rw-r--@  1 andrewchukwu  staff  1924  3 Jun 09:45 index.html
drwxrwxr-x@  8 andrewchukwu  staff   256  3 Jun 09:45 media
-rw-rw-r--@  1 andrewchukwu  staff  1319  3 Jun 09:45 package.json
drwxrwxr-x@ 10 andrewchukwu  staff   320  3 Jun 09:45 pages
```

then visit the the site on: http://localhost:8000/theme/pages/dashboard.html

We can use this as a referneces as we make changes to the actual laravel application templates.

The approach

Lets first work on the sign in/register pages:

## Sign in pages

