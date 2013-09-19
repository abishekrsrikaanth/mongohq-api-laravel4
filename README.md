##Laravel 4 Integration for MongoHQ API


- [Installation](#install)
- [Usage](#usage)
- [Database](#database)
  - [List Databases](#list-db)
  - [Create Database](#create-db)
  - [Get DB Info](#info-db)
  - [Drop DB](#drop-db)
- [Collections](#collections)
- [Indexes](#indexes)

###Installation<a name="install"></a>
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
###Usage<a name="usage"></a>

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

To pass the MongoHQ API Key dynamically

```
$idx = MongoHQ::Indexes('API_KEY_GOES_HERE')
```
-------------------
###Database<a name="database"></a>

####Getting the list of databases<a name="list-db"></a>
```
$db = MongoHQ::Database(); //Initializes the Database Class
$db->get();
```

####Create Database<a name="create-db"></a>
```
$db = MongoHQ::Database();
$db->create('DB_NAME','PLAN_TO_USE');
```

####Get DB Info<a name="info-db"></a>
```
$db = MongoHQ::Database();
$db->info('DB_NAME_TO_GET_THE_INFO');
```

####Drop a Database<a name="drop-db"></a>
```
$db = MongoHQ::Database();
$db->drop('DB_NAME_TO_GET_THE_INFO');
```
-------------------
###Collections<a name="collections"></a>
####Getting the list of collections<a name="list-coll"></a>
```
$coll = MongoHQ::Collections(); //Initializes the Database Class
$coll->get('DB_NAME_TO_GET_THE_LIST_COLLECTIONS');
```

####Create a Collection<a name="create-coll"></a>
```
$coll = MongoHQ::Collections();
$coll->create('DB_NAME_TO_CREATE_THE_COLLECTION_ON','COLLECTION_NAME');
```

####Getting the Collection Stats<a name="stats-coll"></a>
```
$coll = MongoHQ::Collections();
$coll->stats('DB_NAME','COLLECTION_NAME_TO_GET_STATS');
```

####Rename Collection<a name="info-coll"></a>
```
$coll = MongoHQ::Collections();
$coll->rename('DB_NAME','OLD_COLLECTION_NAME','NEW_COLLECTION_NAME');
```

####Drop a Collection from a Database<a name="drop-coll"></a>
```
$coll = MongoHQ::Collections();
$coll->drop('DB_NAME','COLLECTION_NAME_TO_DROP');
```
-----------------
###Indexes<a name="indexes"></a>

####Getting the list of indexes on a Collection<a name="list-idx"></a>
```
$idx = MongoHQ::Indexes(); //Initializes the Database Class
$idx->get('DB_NAME','COLLECTION_NAME');
```

####Create an Index on a Collection<a name="create-idx"></a>
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
####Drop an Index on a Collection<a name="drop-db"></a>
```
$idx = MongoHQ::Indexes();
$idx->drop('DB_NAME','COLLECTION_NAME','IDX_NAME');
```

####Drop all Indexes on the Collection<a name="drop-db"></a>
```
$idx = MongoHQ::Indexes();
$idx->dropAll('DB_NAME','COLLECTION_NAME');
```

[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/abishekrsrikaanth/mongohq-api-laravel4/trend.png)](https://bitdeli.com/free "Bitdeli Badge")