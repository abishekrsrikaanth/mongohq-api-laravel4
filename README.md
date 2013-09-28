##Laravel 4 Integration for MongoHQ API


- [Installation](#install)
- [Usage](#usage)
- [Database](#database)
  - [List Databases](#list-db)
  - [Create Database](#create-db)
  - [Get DB Info](#info-db)
  - [Drop DB](#drop-db)
- [Collections](#collections)
  - [List Collections](#list-coll)
  - [Create Collection](#create-coll)
  - [Collection Stats](#stats-coll)
  - [Rename Collection](#rename-coll)
  - [Drop Collection](#drop-coll)
- [Indexes](#indexes)
  - [List Indexes](#list-idx)
  - [Create Index](#create-idx)
  - [Drop Index](#drop-idx)
  - [Drop All Collection Indexes](#drop-idx-all)
- [Users](#users)
  - [Create User](#create-user)


<a name="install"></a>
###Installation
Add abishekrsrikaanth/mongohq-api as a requirement to composer.json:
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
Publish the Configuration and setup the API Key<a name="config-publish"></a>
```
php artisan config:publish abishekrsrikaanth/mongohq-api
```
---------------------
<a name="usage"></a>
###Usage

***Initializing the database Object***

If the MongoHQ API Key is configured on the [config file published](#config-publish)
```
$db = MongoHQ::Database(); 
```

To pass the MongoHQ API Key dynamically

```
$db = MongoHQ::Database('API_KEY_GOES_HERE')
```

***Initializing the Collections Object***

If the MongoHQ API Key is configured on the [config file published](#config-publish)
```
$coll = MongoHQ::Collections(); 
```

To pass the MongoHQ API Key dynamically

```
$coll = MongoHQ::Collections('API_KEY_GOES_HERE')
```

***Initializing the Indexes Object***

If the MongoHQ API Key is configured on the [config file published](#config-publish)
```
$idx = MongoHQ::Indexes(); 
```

***Initializing the Users Object***

If the MongoHQ API Key is configured on the [config file published](#config-publish)
```
$idx = MongoHQ::Users(); 
```

To pass the MongoHQ API Key dynamically

```
$idx = MongoHQ::Indexes('API_KEY_GOES_HERE')
```

The API Key can be passed to all the initializations mentioned above

-------------------
<a name="database"></a>
###Database

<a name="list-db"></a>
####Getting the list of databases
```
$db = MongoHQ::Database(); //Initializes the Database Class
$db->get();
```

<a name="create-db"></a>
####Create Database
```
$db = MongoHQ::Database();
$db->create('DB_NAME','PLAN_TO_USE');
```

<a name="info-db"></a>
####Get DB Info
```
$db = MongoHQ::Database();
$db->info('DB_NAME_TO_GET_THE_INFO');
```

<a name="drop-db"></a>
####Drop a Database
```
$db = MongoHQ::Database();
$db->drop('DB_NAME_TO_GET_THE_INFO');
```
-------------------
<a name="collections"></a>
###Collections

<a name="list-coll"></a>
####Getting the list of collections
```
$coll = MongoHQ::Collections(); //Initializes the Database Class
$coll->get('DB_NAME_TO_GET_THE_LIST_COLLECTIONS');
```

<a name="create-coll"></a>
####Create a Collection
```
$coll = MongoHQ::Collections();
$coll->create('DB_NAME_TO_CREATE_THE_COLLECTION_ON','COLLECTION_NAME');
```

<a name="stats-coll"></a>
####Getting the Collection Stats
```
$coll = MongoHQ::Collections();
$coll->stats('DB_NAME','COLLECTION_NAME_TO_GET_STATS');
```

<a name="rename-coll"></a>
####Rename Collection
```
$coll = MongoHQ::Collections();
$coll->rename('DB_NAME','OLD_COLLECTION_NAME','NEW_COLLECTION_NAME');
```

<a name="drop-coll"></a>
####Drop a Collection from a Database
```
$coll = MongoHQ::Collections();
$coll->drop('DB_NAME','COLLECTION_NAME_TO_DROP');
```
-----------------
<a name="indexes"></a>
###Indexes

<a name="list-idx"></a>
####Getting the list of indexes on a Collection
```
$idx = MongoHQ::Indexes(); //Initializes the Database Class
$idx->get('DB_NAME','COLLECTION_NAME');
```

<a name="create-idx"></a>
####Create an Index on a Collection
```
$idx = MongoHQ::Indexes();
$idx->create('DB_NAME','COLLECTION_NAME',
    array('name'=>'1'),  //IDX_SPEC - The index spec to be created. (i.e. {name:1})</dd>
    array(
        'background' => true, //Indicate that the index should be built in the background. (defaults to true)
        'unique'     => false, //If true, this index will enforce a uniqueness constraint. (defaults to false)
        'drop_dups'  => false, //If creating a unique index on a collection with pre-existing records, 
                             //this option will keep the first document the database 
                             //indexes and drop all subsequent with duplicate values. (defaults to false)
        'min'        => null, //Specify the minimum longitude and latitude for a geo index. (defaults to null)
        'max'        => null //Specify the maximum longitude and latitude for a geo index. (defaults to null)
        )
    );

```
<a name="drop-idx"></a>
####Drop an Index on a Collection
```
$idx = MongoHQ::Indexes();
$idx->drop('DB_NAME','COLLECTION_NAME','IDX_NAME');
```
<a name="drop-idx-all"></a>
####Drop all Indexes on the Collection
```
$idx = MongoHQ::Indexes();
$idx->dropAll('DB_NAME','COLLECTION_NAME');
```

---------------------------
<a name="users"></a>
###Users

<a name="create-user"></a>
####Creating a User on a DB on MongoHQ
```
$userObj = MongoHQ::Users(); //Initializes the Database Class
$userObj->create('DB_NAME','USER_NAME','PASSWORD');
```

The create function will internally manage the hashing of the password as required by MongoDB.

[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/abishekrsrikaanth/mongohq-api-laravel4/trend.png)](https://bitdeli.com/free "Bitdeli Badge")
[![endorse](https://api.coderwall.com/abishekrsrikaanth/endorsecount.png)](https://coderwall.com/abishekrsrikaanth)
