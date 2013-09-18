mongohq-api-laravel4
====================

Laravel 4 Integration for MongoHQ API

- [Installation](#install)

###Installation<a name="install"></a>
Add abishekrsrikaanth/mailto as a requirement to composer.json:
```
{
    ...
    "require": {
        ...
        "abishekrsrikaanth/mongohq-api": "dev-master"
        ...
    },
}
```
Update composer:
```
$ php composer.phar update
```
Add the provider to your app/config/app.php:
```
'providers' => array(
    ...
    'Abishekrsrikaanth\MongohqApi\MongohqApiServiceProvider',
),
```
and the Facade info on app/config/app.php
```
'aliases'   => array(
    ...
	'MongoHQ'     => 'Abishekrsrikaanth\MongohqApi\Facades\MongohqApi',
),
```
Publish the Configuration and setup the config with the credentials of the different email providers
```
php artisan config:publish abishekrsrikaanth/mongohq-api
```
