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

The approach to take is to find pages with common layouts and build these layouts into laravel. Once layout are built, they can be populated with contents from a blade template page.

Lets first work on the sign in/register pages:

## Sign in page

in this theme, the layouts are quite different for these two pages, so we will create two layouts:

![Alt text](documentation/images/signin-screen.png?raw=true "Title")

and 
![Alt text](documentation/images/signup-screen.png?raw=true "Title")

and 
![Alt text](documentation/images/cut-main-content-layout.png?raw=true "Title")

and 

![Alt text](documentation/images/cut-navbar-layout.png?raw=true "Title")




Create thes files in their respective directories. Because each has a nav and main content area, this directory will each contain blade template files for each common part.

> resources/views/layouts/bootstrap/softui/signin/signin.blade.php

> resources/views/layouts/bootstrap/softui/signup/signup.blade.php

### The routes for this layout:

So we can see changes in the blade template, we will change the main login page to reference the new layour.

Inside resources/views/auth/login.blade.php change the @extends() to reference our signin layout 


```
@extends('layouts.bootstrap.softui.signin')

@section('content')
<div class="container">
...
```

![Alt text](documentation/images/new-login-layout-set.png?raw=true "Title")


We have change to the new layout, however all the assets/images etc referneces are incorrect as we just copied the HTML. We need to place the assets in the public directory so these can be loaded by the layout. We will change first, all the relative references.

```
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
```

change to:
```
<link href="{{ asset('theme/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('theme/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
```
**Note the use of double and single quotes**

If you view the source, you can see that the asset() function has replaced the path with the web URL prefix:

```
<link rel="apple-touch-icon" sizes="76x76" href="http://localhost:8000/theme/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="http://localhost:8000/theme/assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="http://localhost:8000/theme/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="http://localhost:8000/theme/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="http://localhost:8000/theme/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="http://localhost:8000/theme/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
  ```


  
![Alt text](documentation/images/login-page-after-add-theme-1.png?raw=true "Title")


To add the login form, we populate the content section.

Rename the current in resources/views/auth/login.blade.php to "content_old", and add the code from the themes content sections. We will use the code in "content_old" so we can tie the input elements to the livewire variables.


![Alt text](documentation/images/rename-content-section-to-add-new-form.png?raw=true "Title")



![Alt text](documentation/images/login-page-with-theme-form-2.png?raw=true "Title")


There is the background asset to encodes in the {{asset('') }} function.

```
<div class="col-md-6">
    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url( {{asset('theme/assets/img/curved-images/curved6.jpg')}} )"></div>
    </div>
</div>
```

![Alt text](documentation/images/signin-page-looking-good-like-main-theme.png?raw=true "Title")


Now you can compare with the main theme at: **http://localhost:8000/theme/pages/sign-in.html**





# Sign up page

We will work to change the register.blade.php page - resources/views/auth/register.blade.php

Open the file - resources/views/auth/register.blade.php

Change the @extends('layout.app') reference to "@extends('layouts.bootstrap.softui.signup.signup')" and change @section('content') to @section('content-old') and add the new content section:

```
@section('content')
@endsection 
```

Copy content from "public/theme/pages/sign-up.html" into the layout file "resources/views/layouts/bootstrap/softui/signup/signup.blade.php

Then take the content as highlighted and place in the @section('content') of the file: resources/views/auth/register.blade.php (You should have already added the @section('content') section). Also add the @yield('content') to pick up the content (If the signup form doesnt show this may be why).

![Alt text](documentation/images/signup-page-content-register-blade.png?raw=true "Title")


![Alt text](documentation/images/add-yield-to-signup-layout-template.png?raw=true "Title")



Now check the register page (we have not added the asset() function yet, but we can check that is show un-styled HTML)

![Alt text](documentation/images/signup-page-unstyled-blade.png?raw=true "Title")


Now, let add the asset() function wrapper around image,css etc assets





![Alt text](documentation/images/signup-page-converted-in-laravel.png?raw=true "Title")

And compare to: **http://localhost:8000/theme/pages/sign-up.html**


## The Dashboard

We will now work on the main dashboard: **http://localhost:8000/theme/pages/dashboard.html**. the dashboard layout is used for some of the same pages.


Copy the contents of **public/theme/pages/dashboard.html** into **resources/views/layouts/bootstrap/softui/dashboard/dashboard.blade.php**

The dashboard is behind an auth guard i.e you need to be logged in to access it. We will create test route without admin to get it working quickly.


```
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
```
We add:

```
Route::get('/test-dashboard', function () {
    return view('softui.test-dashboard');
})->name('test-dashboard');
```

- Create file resources/views/layouts/bootstreap.softui/dashboard/dashboard.blade.php
- Copy the content of theme/pages.dashbord into the above
- Add the assets wrappers to url references as done with the login and signin pages (there are around 40 references). Also do not forget javascript links/refereces (this will get the chart elements to appear)
- make a file resources/views/softui/dashboard.blade.php

```
<!--   Core JS Files   -->
  <script src="{{ asset('theme//assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('theme//assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('theme//assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('theme//assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('theme//assets/js/plugins/chartjs.min.js') }}"></script>
```

**Dashboard coming together**
![Alt text](documentation/images/dashboard-coming-together.png?raw=true "Title")


![Alt text](documentation/images/dashboard-assets-url-fixed.png?raw=true "Title")



To form the template correctly, take the main content area of the dashboard and place in the file:
```
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
```

Add the **yield('content')**
 
![Alt text](documentation/images/dashboard-template-file-yield-content.png?raw=true "Title")

- To add the other menu items on the right (Tables, billing, virtual reality, RTL, profile). As these have varying layouts, we will keep things consistent and add each as a layout then take the content into a file for its own view.

- Add the following (empty) layout files in **views/layouts/bootstrap/softui/
- tables/tables.blade.php
- billing/billing.blade.php
- virtual_reality/virtual_reality.blade.php
- rtl/rtl.blade.php
- profile/profile.blade.php
- /.blade.php

- Add the additional routes

```
Route::get('/tables', function () {return view('softui.tables'); })->name('tables');
Route::get('/billing', function () {return view('softui.billing'); })->name('billing');
Route::get('/virtual_reality', function () {return view('softui.virtualreality'); })->name('virtualreality');
Route::get('/rtl', function () {return view('softui.rtl'); })->name('rtl');
Route::get('/profile', function () {return view('softui.profile'); })->name('profile');
```

- Add the view pages with the reference to the template and the content. Replace **A** and **B** with the path to the layout file
```
@extends('layouts.bootstrap.softui.A.B)

@section('content')
@endsection
```

*** There are repeated sections in these headers, so it would be beneifical to normalize the files (ensure that we do not have repeated copy/paste code on the UI) especially for the layouts.

Copy the file : **resources/views/dashboard.html** to **resources/views/test-dashboard.html**. And then change the layout reference:

